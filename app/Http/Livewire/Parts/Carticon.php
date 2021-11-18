<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use Cookie;

class Carticon extends Component
{
    protected $listeners = ['itemAdded'];

    public function mount(){
        $count = 0;
        if( Cookie::get('coursebasket') || Cookie::get('productbasket') ){
            if(Cookie::get('coursebasket')){ 
                $count = count( json_decode( Cookie::get('coursebasket') ) );
            }
            if(Cookie::get('productbasket')){ 
                $productbasket = json_decode( Cookie::get('productbasket') );
                foreach ($productbasket as $i) { $count += $i[1]; }
            }
        }
        $this->count = $count;
    }

    public function render(){
        return view('livewire.parts.carticon');
    }

    public function itemAdded($count){
        // dd($count);
        
        
        $this->count = $count; }
}
