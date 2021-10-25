<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use App\Models\Master;
use App\Models\Course;
use App\Models\Product;
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
        $reviews =  Coursereview::leftJoin('users as b', function($join) { $join->on("b.id", "=", "coursereviews.userid"); })
                        ->where("coursereviews.status", 1)
                        ->where("coursereviews.courseid", $id)
                        ->where("coursereviews.type", 'Course')
                        ->select('coursereviews.id', 'coursereviews.review', 'coursereviews.rating', 'b.name as userName' )
                        ->get();
        $data = Course::select('id', 'name', 'image', 'shortdesc', 'longdesc', 'price', 'sale', 'rating', 'videos' )
                ->where('id', $id)->first();

        return response()->json([
            'data' => $data,
            'reviews' => $reviews
        ]);
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




}
