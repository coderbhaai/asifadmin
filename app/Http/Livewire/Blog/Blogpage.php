<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Blogmeta;

class Blogpage extends Component
{
    public $data = [];
    public $heading;

    public function mount(){
        if(request()->path()!='blog'){
            $type = strtok(request()->path(), '/');
            $url = substr( strstr(request()->path(), '/'), 1);
            $id   =   Blogmeta::select('id', 'name')->where('url', $url )->first();
            $this->data =   Blog::select('id', 'title', 'url', 'smallImg', 'category')->whereJsonContains($type, $id->id)->orderBy('id', 'desc')->get()->map(function($i) {
                $catArray = [];
                if(json_decode( $i->category ) ){
                    $xx   =   Blogmeta::select('name', 'url')->whereIn('id', json_decode( $i->category ) )->get();
                    for ($j=0; $j <count($xx) ; $j++) { array_push( $catArray, $xx[$j] ); }
                }
                $i['catArray']  =   $catArray;            
                return $i;
            });
            $this->heading = "Blog of ".$type. " - ".$id->name;

        }else{
            $this->heading = "Interesting Reads";
            $this->data =   Blog::select('id', 'title', 'url', 'smallImg', 'category')->orderBy('id', 'desc')->get()->map(function($i) {
                $catArray = [];
                if(json_decode( $i->category ) ){
                    $xx   =   Blogmeta::select('name', 'url')->whereIn('id', json_decode( $i->category ) )->get();
                    for ($j=0; $j <count($xx) ; $j++) { array_push( $catArray, $xx[$j] ); }
                }
                $i['catArray']  =   $catArray;            
                return $i;
            });
        }
    }
    
    public function render(){        
        return view('livewire.blog.blogpage');
    }
}