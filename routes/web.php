<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Pages\Home;
use App\Http\Livewire\Pages\Contact;
use App\Http\Livewire\Pages\Fourofour;
use App\Http\Livewire\Pages\Sitemap;
use App\Http\Livewire\Pages\Thankyou;
use App\Http\Livewire\Pages\Privacy;
use App\Http\Livewire\Pages\Videos;

use App\Http\Livewire\Ecom\Shop;
use App\Http\Livewire\Ecom\Product;
use App\Http\Livewire\Ecom\Cart;
use App\Http\Livewire\Ecom\Checkout;
use App\Http\Livewire\Ecom\Courses;
use App\Http\Livewire\Ecom\Singlecourse;

use App\Http\Livewire\Blog\Blogpage;
use App\Http\Livewire\Blog\Single;

use App\Http\Livewire\Admin\Addblog;
use App\Http\Livewire\Admin\Adminblog;
use App\Http\Livewire\Admin\Adminblogmeta;
use App\Http\Livewire\Admin\Admincomments;
use App\Http\Livewire\Admin\Adminmeta;
use App\Http\Livewire\Admin\Adminusers;
use App\Http\Livewire\Admin\Updateblog;
use App\Http\Livewire\Admin\Adminsubscribe;
use App\Http\Livewire\Admin\Adminproducts;
use App\Http\Livewire\Admin\Addproduct;
use App\Http\Livewire\Admin\Updateproduct;
use App\Http\Livewire\Admin\Adminmaster;
use App\Http\Livewire\Admin\Addcourse;
use App\Http\Livewire\Admin\Updatecourse;
use App\Http\Livewire\Admin\Admincourses;
use App\Http\Livewire\Admin\Coursereviews;
use App\Http\Livewire\Admin\Adminmarketing;
use App\Http\Livewire\Admin\Adminorders;
use App\Http\Livewire\Admin\Adminmedia;

use App\Http\Livewire\User\Userorders;

use App\Http\Controllers\RazorpayController;

Route::get('/', Home::class)->name('home');
Route::get("/contact", Contact::class)->name('contact');
Route::get("/404", Fourofour::class)->name('404');
Route::get("/sitemap", Sitemap::class)->name('sitemap');
Route::get("/thankyou", Thankyou::class)->name('thankyou');
Route::get("/privacy-policy", Privacy::class)->name('privacy');
Route::get("/videos", Videos::class)->name('videos');

Route::get("/shop", Shop::class)->name('shop');
Route::get("/product/{url}", Product::class)->name('product');
Route::get("/cart", Cart::class)->name('cart');
Route::get("/checkout", Checkout::class)->name('checkout');
Route::get("/courses", Courses::class)->name('courses');
Route::get("/course/{url}", Singlecourse::class)->name('singlecourse');

Route::get('/blog', Blogpage::class)->name('blogs');
Route::get('/tag/{url}', Blogpage::class);
Route::get('/category/{url}', Blogpage::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () { return view('dashboard'); })->name('dashboard');
        Route::get('/admin/masters', Adminmaster::class)->name('adminmaster');
        Route::get('/admin/meta', Adminmeta::class)->name('meta');
        Route::get('/admin/comments', Admincomments::class)->name('admincomments');
        Route::get('/admin/blogmeta', Adminblogmeta::class)->name('blogmeta');
        Route::get('/admin/blog', Adminblog::class)->name('adminblog');
        Route::get('/admin/addblog', Addblog::class)->name('addblog');
        Route::get('/admin/updateblog/{id}', Updateblog::class)->name('updateblog');
        Route::get('/admin/users', Adminusers::class)->name('adminusers');
        Route::get('/admin/subscription', Adminsubscribe::class)->name('adminSubscription');
        Route::get('/admin/products', Adminproducts::class)->name('adminproducts');
        Route::get('/admin/addproduct', Addproduct::class)->name('addproduct');
        Route::get('/admin/updateproduct/{id}', Updateproduct::class)->name('updateproduct');
        Route::get('/admin/courses', Admincourses::class)->name('admincourses');
        Route::get('/admin/addcourse', Addcourse::class)->name('addcourse');
        Route::get('/admin/updatecourse/{id}', Updatecourse::class)->name('updatecourse');
        Route::get('/admin/coursereviews', Coursereviews::class)->name('coursereviews');
        Route::get('/admin/marketing', Adminmarketing::class)->name('adminmarketing');
        Route::get('/admin/orders', Adminorders::class)->name('adminorders');
        Route::get('/admin/media', Adminmedia::class)->name('adminmedia');
    });
    Route::middleware(['user'])->group(function () {
        Route::get('/user/orders', Userorders::class)->name('userorders');
    });
});

Route::post('payment', [RazorpayController::class, 'payment'])->name('payment');

Route::get('/{url}', Single::class)->name('single');
