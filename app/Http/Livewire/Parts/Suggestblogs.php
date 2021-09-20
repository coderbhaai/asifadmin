<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use App\Models\Blog;

class Suggestblogs extends Component
{
    public $data;

    public function render(){
        $this->data =   Blog::select('id', 'title', 'url', 'smallImg', 'created_at')->orderBy('id', 'desc')->limit(6)->get();
        return view('livewire.parts.suggestblogs');
    }
}
