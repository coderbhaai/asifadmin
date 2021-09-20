<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Product;

class Shop extends Component
{
    public $perPage = 25;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'price', 'sale', 'status', 'updated_at')
                        ->search($this->search)->paginate($this->perPage);

        $data->getCollection()->transform(function ($i) {
            $i['image']  =   json_decode( $i->images)[0];
            // $xx   =   Master::select('name', 'url')->whereIn('id', json_decode( $i->category ) )->get();
            // $catArray = [];
            // for ($j=0; $j <count($xx) ; $j++) { array_push( $catArray, $xx[$j] ); }
            // $i['catArray']  =   $catArray;

            // $y   =   Master::select('name', 'url')->whereIn('id', json_decode( $i->tag ) )->get();
            // $tagArray = [];
            // for ($j=0; $j <count($y) ; $j++) { array_push( $tagArray, $y[$j] ); }
            // $i['tagArray']  =   $tagArray;
            return $i;
        });
        return view('livewire.ecom.shop', 
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }
}