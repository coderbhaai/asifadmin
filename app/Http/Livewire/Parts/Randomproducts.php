<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use App\Models\Product;

class Randomproducts extends Component
{
    public $data;

    public function render(){
        $this->data =   Product::select('id', 'name', 'url', 'images', 'price', 'sale')->inRandomOrder()->limit(6)->get()->map(function($i) {
            $i['image']  =   json_decode( $i->images)[0];
            return $i;
        });
        return view('livewire.parts.randomproducts');
    }
}
