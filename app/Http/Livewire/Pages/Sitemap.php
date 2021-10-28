<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Course;
use App\Models\Product;
use App\Models\Blogmeta;

class Sitemap extends Component
{
    public $pages =[
        [ "name" => "About Us", "url"=>"/about-us" ],
        [ "name" => "Contact", "url" => "/contact" ],
        [ "name" => "404", "url" => "/404" ],
        [ "name" => "Sitemap", "url" => "/sitemap" ],
        [ "name" => "Thank You", "url" => "/thankyou" ],
        [ "name" => "About Us", "url" => "/about-hindraj" ],
        [ "name" => "Shipping and Returns", "url" => "/shipping-and-returns" ],
        [ "name" => "Terms and Conditions", "url" => "/terms-and-conditions" ],
    ];

    public $social = [
        [ "name"=>"Facebook", "url"=>"/" ],
        [ "name"=>"Twitter", "url"=>"/" ],
        [ "name"=>"Instagram", "url"=>"/" ],
        [ "name"=>"YouTube", "url"=>"/" ]
    ];

    public function render(){
        $products =   Product::select('name', 'url')->orderBy('id', 'desc')->get();
        $courses =   Course::select('name', 'url')->orderBy('id', 'desc')->get();
        $blogs =   Blog::select('title as name', 'url')->orderBy('id', 'desc')->get();
        $cat = Blogmeta::select('name', 'url')->where('type', 'category')->get();
        $tag = Blogmeta::select('name', 'url')->where('type', 'tag')->get();
        return view('livewire.pages.sitemap',
            [
                'products' => $products,
                'courses' => $courses,
                'blogs' => $blogs,
                'cat' => $cat,
                'tag' => $tag,
            ]
        );
    }
}
