<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Cookie;
use Auth;
use Mail;
use App\Models\Product;
use App\Models\Course;
use App\Models\Order;
use App\Mail\Ordermail;

class RazorpayController extends Controller
{
    public function payment(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        $details = [
            $payment['notes']['name'],
            $payment['notes']['email'],
            $payment['notes']['phone'],
            $payment['notes']['country'],
            $payment['notes']['state'],
            $payment['notes']['city'],
            $payment['notes']['address'],
            $payment['notes']['pin'],
        ];

        if( count($input)  && !empty($input['razorpay_payment_id']) ){
            try {
                if(Cookie::get('coursebasket')){ 
                    $this->coursebasket = json_decode( Cookie::get('coursebasket') );
                    $courses = Course::select('id', 'name', 'url', 'price', 'sale', 'image' )->whereIn('id', $this->coursebasket)->get();

                    foreach ( $courses as $i) {
                        $dB                     =   new Order;
                        $dB->paymentId          =   $input["razorpay_payment_id"];
                        $dB->orderId            =   $input["razorpay_order_id"];
                        $dB->type               =   'Course';
                        $dB->buyer              =   Auth::user()->id;
                        $dB->address            =   json_encode( $details );
                        $dB->cart               =   json_encode($i->id);
                        $dB->amount             =   $i['sale'];
                        $dB->discount           =   0;
                        $dB->status             =   "Ordered";
                        $dB->remarks            =   "Ordered";
                        $dB-> save();
                    }
                }

                if(Cookie::get('productbasket')){ 
                    $productbasket = json_decode( Cookie::get('productbasket') );
                    $productIds = []; foreach ($productbasket as $i) { array_push($productIds, $i[0]); }
                    
                    $products = Product::select('id', 'name', 'url', 'price', 'sale', 'images' )->whereIn('id', $productIds)->get()->map(function($i) {
                        $productbasket = json_decode( Cookie::get('productbasket') );
                        foreach ($productbasket as $j) { 
                            if($i->id === $j[0]){ $i['amount'] = $j[1]; } 
                        }
                        return $i;
                    });

                    $xx = $products->map(function ($i) {
                        $yy = 0;
                        $productbasket = json_decode( Cookie::get('productbasket') );
                        foreach ($productbasket as $j) { 
                            if($i->id === $j[0]){ $yy += $j[1] * (int)$i->sale; } 
                        }            
                        return $yy;
                    });
                    $productTotal = 0; 
                    foreach ($xx as $j) { $productTotal += $j; }

                    $dB                     =   new Order;
                    $dB->paymentId          =   $input["razorpay_payment_id"];
                    $dB->orderId            =   $input["razorpay_order_id"];
                    $dB->type               =   'Product';
                    $dB->buyer              =   Auth::user()->id;
                    $dB->address            =   json_encode( $details );
                    $dB->cart               =   json_encode( $products );
                    $dB->amount             =   $productTotal;
                    $dB->discount           =   0;
                    $dB->status             =   "Ordered";
                    $dB->remarks            =   "Ordered";
                    $dB-> save();
                }

                $user_email = $payment['notes']['email'];
                Mail::to( $user_email)->cc('amit@amitkk.com')->send(new Ordermail($courses, $products));
                Cookie::queue(Cookie::forget('cart'));

            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
        
        Session::put('success', 'Payment successful');
        return redirect('thankyou');
    }
}
