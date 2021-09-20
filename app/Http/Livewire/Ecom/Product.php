<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\Coursereview;

class Product extends Component
{
    public $name, $url, $shortdesc, $longdesc, $price, $sale, $rating, $images, $activeImage;
    public $reviews = [];
    public $similar = [];

    public function mount($url){
        $this->data =       ProductModel::where('status', 1)->where('url', $url)->first();
        if($this->data != null){
            $this->similar =            ProductModel::where('status', 1)->where('id', '!=', $this->data->id)->Limit(6)->get()->map(function($i) {
                $i['image']  =   json_decode( $i->images)[0];
                return $i;
            });
            $this->name =               $this->data->name;
            $this->url =                $this->data->url;
            $this->shortdesc =          $this->data->shortdesc;
            $this->longdesc =           $this->data->longdesc;
            $this->price =              $this->data->price;
            $this->sale =               $this->data->sale;
            $this->rating =             json_decode( $this->data->rating );
            $this->images =             json_decode( $this->data->images );
            $this->activeImage =        json_decode( $this->data->images )[0];
            $this->reviews =            Coursereview::where('courseid', $this->data->id)->where('status', 1)->get();
        }else{
            return redirect('/404');
        }
    }

    public function render(){
        return view('livewire.ecom.product');
    }

    public function activeImage($index){
        $this->activeImage = $this->images[$index];
    }
}