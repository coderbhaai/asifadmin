<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use App\Models\Blogmeta;

class Singlesidebar extends Component
{
    public $category = [];
    public $tag = [];
    
    public function render(){
        $this->category = Blogmeta::select('id', 'name', 'url')->where('type', 'category')->get();
        $this->tag = Blogmeta::select('id', 'name', 'url')->where('type', 'tag')->get();
        return view('livewire.parts.singlesidebar');
    }
}