<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/test', 'App\Http\Controllers\ApiController@test');
Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', 'App\Http\Controllers\ApiController@products');
    Route::get('/featuredCourses', 'App\Http\Controllers\ApiController@featuredCourses');
});

