<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;

class Adminsidebar extends Component
{
    public $data =[
        // [ "link"=>"dashboard", "name"=>"Dashboard" ],
        // [ "link"=>"meta", "name"=>"Meta Tags" ],
        // [ "link"=>"blogmeta", "name"=>"Blog Meta" ],
        // [ "link"=>"adminblog", "name"=>"Blog" ],
        // [ "link"=>"admincomments", "name"=>"Comments" ],
        // [ "link"=>"adminSubscription", "name"=>"Subscription" ],
        // [ "link"=>"adminusers", "name"=>"Users" ],
        // [ "link"=>"adminsitemap", "name"=>"Sitemap" ],
        // [ "link"=>"adminschema", "name"=>"Schema" ],
    ];

    public function render(){
        return view('livewire.parts.adminsidebar');
    }
}
