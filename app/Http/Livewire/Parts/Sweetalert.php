<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;

class Sweetalert extends Component
{
    public $message;
    
    public function render(){
        return view('livewire.parts.sweetalert');
    }
}
