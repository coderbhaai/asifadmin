<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use App\Models\Master;

class Productsidebar extends Component
{
    public $type = [];
    public $category = [];
    public $tag = [];
    public $similar = [];

    public function render(){
        $this->type = Master::select('id', 'name', 'url')->where('type', 'prodType')->get();
        $this->category = Master::select('id', 'name', 'url')->where('type', 'prodCat')->get();
        $this->tag = Master::select('id', 'name', 'url')->where('type', 'prodTag')->get();
        return view('livewire.parts.productsidebar');
    }
}