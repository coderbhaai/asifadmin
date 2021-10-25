<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;

class Adminsidebar extends Component
{
    public $data =[
        // [ "link"=>"dashboard", "name"=>"Dashboard" ],
        [ "link"=>"adminmaster", "name"=>"Masters" ],
        [ "link"=>"meta", "name"=>"Meta Tags" ],
        [ "link"=>"blogmeta", "name"=>"Blog Meta" ],
        [ "link"=>"adminblog", "name"=>"Blog" ],
        [ "link"=>"admincomments", "name"=>"Comments" ],
        [ "link"=>"adminSubscription", "name"=>"Subscription" ],
        [ "link"=>"adminusers", "name"=>"Users" ],
        // [ "link"=>"adminsitemap", "name"=>"Sitemap" ],
        // [ "link"=>"adminschema", "name"=>"Schema" ],
        [ "link"=>"adminproducts", "name"=>"Products" ],
        [ "link"=>"admincourses", "name"=>"Courses" ],
        [ "link"=>"coursereviews", "name"=>"Reviews" ],
        [ "link"=>"adminmarketing", "name"=>"marketing" ],
    ];

    public function render(){
        return view('livewire.parts.adminsidebar');
    }
}
