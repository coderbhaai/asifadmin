<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use App\Models\Course;
use App\Models\Product;
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

    public function featuredCourses(){
        $data = Course::select('id', 'name', 'image')->where('status', 1)->Limit(4)->get();
        return response()->json([
            'data' => $data
        ]);
    }



}
