<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use App\Models\Order;
use App\Models\Master;
use App\Models\Course;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Coursereview;
use App\Models\Marketing;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test(){
        return response()->json([
            'data' => 'Working'
        ]);
    }

    public function products(){
        return response()->json([
            'data' => 'Working'
        ]);
    }

    public function staticData(){
        $banner = [
            '1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg',
        ];
        $ads = [
            'ad-1.jpg', 'ad-2.jpg', 'ad-3.jpg', 'ad-4.jpg', 'ad-5.jpg',
        ];

        return response()->json([
            'banner' => $banner,
            'ads' => $ads,
        ]);
    }

    public function marketing(){
        $data = Marketing::select('id', 'heading', 'video', 'description')->where('status', 1)->get();
        return response()->json([
            'data' => $data
        ]);
    }
    
    public function featuredCourses(){
        $data = Course::select('id', 'name', 'image')->where('status', 1)->Limit(4)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function courseList(){
        $data = Course::select('id', 'name', 'image', 'shortdesc', 'price', 'sale')->where('status', 1)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function singleCourse($id){
        if (Order::where('cart', $id)->where('buyer', Auth::user()->id)->exists()) {
            $reviews =  Coursereview::leftJoin('users as b', function($join) { $join->on("b.id", "=", "coursereviews.userid"); })
                            ->where("coursereviews.status", 1)
                            ->where("coursereviews.courseid", $id)
                            ->where("coursereviews.type", 'Course')
                            ->select('coursereviews.id', 'coursereviews.review', 'coursereviews.rating', 'b.name as userName' )
                            ->get();
            $data = Course::select('id', 'name', 'image', 'shortdesc', 'longdesc', 'price', 'sale', 'rating', 'videos' )
                    ->where('id', $id)->get()->map(function($i) {
                        $i['videoArray'] = json_decode($i->videos);
                        return $i;
                    });    
            return response()->json([
                'success' => true,
                'message' => "Happy Learning",
                'data' => $data,
                'reviews' => $reviews
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => "You have not purchased this course yet",
            ]);
        }
    }

    public function postReview(request $request){
        $dB                     =   new Coursereview;
        $dB->type               =   $request->type;
        $dB->courseid           =   $request->courseid;
        $dB->userid             =   $request->userid;
        $dB->review             =   $request->review;
        $dB->rating             =   $request->rating;
        $dB->status             =   0;
        $dB-> save();

        $response = ['success'=>true, 'message' => "Review submitted for approval"];
        return response()->json($response, 201);
    }

    public function ecomCategories(){
        $data = Master::select('id', 'name', 'tab1')->where('type', 'prodCat')->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function ecomRecom(){
        $id = Master::select('id')->where('type', 'prodTag')->where('name', 'Recommended')->first();
        $data = Product::select('id', 'name', 'images', 'price', 'sale')->whereJsonContains('tag', $id->id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function ecomTrending(){
        $id = Master::select('id')->where('type', 'prodTag')->where('name', 'Trending')->first();
        $data = Product::select('id', 'name', 'images', 'price', 'sale')->whereJsonContains('tag', $id->id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function ecomCategoryProducts($id){
        $data = Product::select('id', 'name', 'images', 'price', 'sale')->whereJsonContains('category', (int)$id)->get();
        return response()->json([
            'data' => $data
        ]);
    }

    public function singleProduct($id){
        $reviews =  Coursereview::leftJoin('users as b', function($join) { $join->on("b.id", "=", "coursereviews.userid"); })
                        ->where("coursereviews.status", 1)
                        ->where("coursereviews.courseid", $id)
                        ->where("coursereviews.type", 'Product')
                        ->select('coursereviews.id', 'coursereviews.review', 'coursereviews.rating', 'b.name as userName' )
                        ->get();

        $data = Product::select('id', 'name', 'images', 'shortdesc', 'longdesc', 'price', 'sale', 'rating' )
                ->where('id', $id)->first();
        return response()->json([
            'data'          => $data,
            'reviews'       => $reviews
        ]);
    }

    public function allProducts(){
        $data = Product::select('id', 'name', 'images', 'shortdesc', 'price', 'sale', 'rating' )->where('status', 1)->get();
        return response()->json([
            'data'          => $data
        ]);
    }

    public function myOrders(){
        $products =     Order::where('buyer', Auth::user()->id)->where('type', 'Product')
                    ->select( 'orderId', 'id', 'address as addr', 'cart', 'amount', 'status', 'remarks', 'updated_at' )->get()->map(function($i) {
                        $i['cartArray'] = json_decode($i->cart);
                        $i['addressArray'] = json_decode($i->addr);
                        return $i;
                    });

        $courses =   Order::leftJoin('courses as b', function($join) { $join->on("orders.cart", "=", "b.id"); })
                ->where('orders.type', 'Course')->where('buyer', Auth::user()->id)
                ->select( 'orders.orderId', 'orders.id', 'orders.address', 'orders.buyer', 'orders.amount', 'orders.discount', 'orders.status', 'orders.remarks', 'orders.updated_at', 'b.name as courseName', 'b.id as courseId' )->get();

        return response()->json([
            'products'          => $products,
            'courses'          => $courses
        ]);
    }

    public function paymentCourse(request $request){
        foreach ( json_decode($request->courseArray) as $i){
            $dB                     =   new Order;
            $dB->paymentId          =   $request->razorpay_payment_id;
            $dB->orderId            =   $request->razorpay_order_id;
            $dB->type               =   'Course';
            $dB->buyer              =   Auth::user()->id;
            $dB->address            =   json_encode( $request->details );
            $dB->cart               =   $i[0];
            $dB->amount             =   $i[1];
            $dB->discount           =   0;
            $dB->status             =   "Ordered";
            $dB->remarks            =   "Ordered";
            $dB-> save();
        }
        return response()->json([
            'success'       => true,
            'data'          => $request->all(),
        ]);
    }

    public function paymentProduct(request $request){
        $dB                     =   new Order;
        $dB->paymentId          =   $request->razorpay_payment_id;
        $dB->orderId            =   $request->razorpay_order_id;
        $dB->type               =   'Product';
        $dB->buyer              =   Auth::user()->id;
        $dB->address            =   json_encode( $request->details );
        $dB->cart               =   json_encode( $request->cart );
        $dB->amount             =   $request->amount;
        $dB->discount           =   0;
        $dB->status             =   "Ordered";
        $dB->remarks            =   "Ordered";
        $dB-> save();

        return response()->json([
            'success'       => true,
            'data'          => $request->all(),
        ]);
    }

    public function updateProfile(request $request){
        if (Profile::where('userId', Auth::user()->id)->exists()) {
            $dB                     =   Profile::where('userId', Auth::user()->id)->first();
            $dB->address            =   json_encode( $request->address );
            $dB->pic                =   $request->pic;
            $dB-> save();

            return response()->json([
                'success'           => true,
                'message'           => 'Profile Updated succesfully',
            ]);
        }else{
            $dB                     =   new Profile;
            $dB->userId             =   Auth::user()->id;
            $dB->address            =   json_encode( $request->address );
            $dB->pic                =   $request->pic;
            $dB-> save();

            return response()->json([
                'success'           => true,
                'message'           => 'Profile Created succesfully',
            ]);
        }

    }
}

// ['name','email','phone','country','state','city','address','pin']