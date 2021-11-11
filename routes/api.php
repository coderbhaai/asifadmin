<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/test', 'App\Http\Controllers\ApiController@test');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/forgotPassword', 'App\Http\Controllers\AuthController@forgotPassword');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/marketing', 'App\Http\Controllers\ApiController@marketing');
    Route::get('/staticData', 'App\Http\Controllers\ApiController@staticData');
    Route::get('/products', 'App\Http\Controllers\ApiController@products');
    Route::get('/featuredCourses', 'App\Http\Controllers\ApiController@featuredCourses');
    Route::get('/courseList', 'App\Http\Controllers\ApiController@courseList');
    Route::get('/singleCourse/{id}', 'App\Http\Controllers\ApiController@singleCourse');
    Route::post('/postReview', 'App\Http\Controllers\ApiController@postReview');
    
    Route::get('/ecomCategories', 'App\Http\Controllers\ApiController@ecomCategories');
    Route::get('/ecomRecom', 'App\Http\Controllers\ApiController@ecomRecom');
    Route::get('/ecomTrending', 'App\Http\Controllers\ApiController@ecomTrending');
    Route::get('/ecomCategoryProducts/{id}', 'App\Http\Controllers\ApiController@ecomCategoryProducts');
    Route::get('/singleProduct/{id}', 'App\Http\Controllers\ApiController@singleProduct');
    Route::get('/myOrders', 'App\Http\Controllers\ApiController@myOrders');
    Route::post('/paymentCourse', 'App\Http\Controllers\ApiController@paymentCourse');
    Route::post('/paymentProduct', 'App\Http\Controllers\ApiController@paymentProduct');
    Route::post('/updateProfile', 'App\Http\Controllers\ApiController@updateProfile');
    Route::get('/getProfile', 'App\Http\Controllers\ApiController@getProfile');
    Route::post('/getProductsData', 'App\Http\Controllers\ApiController@getProductsData');
    Route::get('/allProducts', 'App\Http\Controllers\ApiController@allProducts');
});

