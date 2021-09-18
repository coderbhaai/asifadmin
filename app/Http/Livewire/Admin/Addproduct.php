<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Addproduct extends Component
{
    public function render(){
        $typeOptions = [];
        $tagOptions = [];
        $catOptions = [];
        return view('livewire.admin.addproduct', 
            [
                'typeOptions'              =>  $typeOptions,
                'tagOptions'               =>  $tagOptions,
                'catOptions'               =>  $catOptions,
            ]
        );
    }
}
