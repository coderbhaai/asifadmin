<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use Cookie;

class Singleproductitem extends Component
{
    public $item;
    
    public function render(){
        return view('livewire.parts.singleproductitem');
    }

    public function addToCart($i){
        if(Cookie::get('productbasket')){
            $exists = $this->addIncart($i['id']);
            if(!$exists){ 
                $productInCart = json_decode( Cookie::get('productbasket') );
                array_push( $productInCart, [ $i['id'], 1 ] ); 
                $this->cart = $productInCart;
                Cookie::queue( 'productbasket', json_encode( $productInCart ) );                
                $this->sendCartNumber( $productInCart);
            }
        }else{
            $productInCart = [];
            array_push( $productInCart, [ $i['id'], 1 ] );
            Cookie::queue( 'productbasket', json_encode( $productInCart ) );
            $this->sendCartNumber( $productInCart);
        }        
    }

    private function addIncart($id){
        $productInCart = json_decode( Cookie::get('productbasket') );
        foreach ($productInCart as $key => $value) {
            if($value[0] === $id){
                $productInCart[$key][1] += 1;
                Cookie::queue( 'productbasket', json_encode( $productInCart ) );
                $this->cart = $productInCart;
                $this->sendCartNumber( $productInCart);
                return true;
            }
        }
    }

    public function sendCartNumber($productbasket){
        $count = 0;

        if( count( $productbasket ) ){ foreach ($productbasket as $i) { $count += $i[1]; } }

        if(Cookie::get('coursebasket')){
            $coursebasket = json_decode( Cookie::get('coursebasket') );
            foreach ($coursebasket as $i) { $count += $i; }
        }
        
        $this->emit('itemAdded', $count);
        session()->flash('message', 'Cart Updated Successfully.');
    }
}
