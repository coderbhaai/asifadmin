<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use Cookie;
use Auth;
use App\Models\Product;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{

    public $orderId, $name, $email, $phone, $country, $state, $city, $address, $pin;
    public $total = 0;
    public $buyer = [];
    public $coursebasket = [];
    public $productbasket = [];
    public $products = [];
    public $courses = [];

    public function render(){
        return view('livewire.ecom.checkout');
    }

    public function mount(){
        if( !Cookie::get('buyer') ){ 
            return redirect('/shop'); 
        }else{
            $buyer = json_decode( Cookie::get('buyer') );
            $this->name = $buyer->name;
            $this->email = $buyer->email;
            $this->phone = $buyer->phone;
            $this->country = $buyer->country;
            $this->state = $buyer->state;
            $this->city = $buyer->city;
            $this->address = $buyer->address;
            $this->pin = $buyer->pin;
        }

        if( !Cookie::get('coursebasket') && !Cookie::get('productbasket') ){ 
            return redirect('/shop'); 
        }else{
            if( Cookie::get('productbasket') ){ $this->productbasket = json_decode( Cookie::get('productbasket') ); } else{ $this->productbasket = []; }
            if( Cookie::get('coursebasket') ){ $this->coursebasket = json_decode( Cookie::get('coursebasket') ); }else{ $this->coursebasket = []; }
    
            if( count( $this->coursebasket ) || count( $this->productbasket ) ){ 
                $this->getProductsFromCart( $this->coursebasket, $this->productbasket ); 
                $response = Http::withBasicAuth( env('RAZORPAY_KEY'), env('RAZORPAY_SECRET') )->post('https://api.razorpay.com/v1/orders', [
                    "amount" => $this->total*100,
                    "currency" => "INR",
                    "receipt" => "rcptid_11"
                ]);
                if($response->json()){ $this->orderId = $response->json()['id']; }
            }
        }        
    }

    private function getProductsFromCart( $coursebasket, $productbasket ){
        $productIds = []; foreach ($productbasket as $i) { array_push($productIds, $i[0]); }
        $products = Product::select('id', 'name', 'url', 'price', 'sale', 'images' )->whereIn('id', $productIds)->get()->map(function($i) {
            $i['image']  =   json_decode( $i->images)[0];
            foreach ($this->productbasket as $j) { if($i->id === $j[0]){ $i['amount'] = $j[1]; } }            
            return $i;
        });
        
        $courses = Course::select('id', 'name', 'url', 'price', 'sale', 'image' )->whereIn('id', $coursebasket)->get();

        $total = 0;
        foreach ($products as $i) { $total += $i['amount'] * $i['sale'];  }
        foreach ($courses as $i) { $total += $i['sale']; }

        $this->total = $total;
        $this->products = $products;
        $this->courses = $courses;
    }
}
