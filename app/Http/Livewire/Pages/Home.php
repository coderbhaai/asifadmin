<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render(){
        // dd(json_encode([[1,400], [2,500]]));
        return view('livewire.pages.home');
    }
}
