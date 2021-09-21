<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Product;
use Cookie;

class Cart extends Component
{
    public $total = 0;
    public $cart = [];
    public $products = [];

    public function mount(){
        if(Cookie::get('cart')){
            $this->cart = json_decode( Cookie::get('cart') );
            $this->getProductsFromCart($this->cart);
        }else{
            $this->cart = [];
            $this->products = [];
        }


    }

    public function render(){
        return view('livewire.ecom.cart', 
            [
                'products'          =>  $this->products,
                'cart'              =>  $this->cart,
                'total'             =>  $this->total,
            ]
        );
    }

    public function addToCart($i){
        if(Cookie::get('cart')){
            $exists = $this->addIncart($i['id']);
            if(!$exists){ 
                $cart = json_decode( Cookie::get('cart') );
                array_push( $cart, [ $i['id'], 1 ] ); 
                $this->cart = $cart;
                Cookie::queue( 'cart', json_encode( $cart ) );
                $this->getProductsFromCart($cart);
            }
        }else{
            $cart = [];
            array_push( $cart, [ $i['id'], 1 ] );
            Cookie::queue( 'cart', json_encode( $cart ) );
            $this->getProductsFromCart($cart);
        }
    }

    private function addIncart($id){
        $cart = json_decode( Cookie::get('cart') );
        foreach ($cart as $key => $value) {
            if($value[0] === $id){
                $cart[$key][1] += 1;
                Cookie::queue( 'cart', json_encode( $cart ) );
                $this->cart = $cart;
                $this->getProductsFromCart($cart);                
                return true;
            }
        }
    }

    public function removeFromCart($i){
        if(Cookie::get('cart')){
            $this->removeIncart($i['id']);
        }
    }

    private function removeIncart($id){
        $cart = json_decode( Cookie::get('cart') );
        foreach ($cart as $key => $value) {
            if($value[0] === $id){
                if($cart[$key][1] === 1){
                    array_splice($cart, $key, 1);
                }else{
                    $cart[$key][1] -= 1;
                }
                Cookie::queue( 'cart', json_encode( $cart ) );
                $this->cart = $cart;
                $this->getProductsFromCart($cart);
            }
        }
    }

    private function getProductsFromCart($cart){
        $ids = []; foreach ($cart as $i) { array_push($ids, $i[0]); }
        $products = Product::select('id', 'name', 'url', 'price', 'sale', 'images' )->whereIn('id', $ids)->get()->map(function($i) {
            $i['image']  =   json_decode( $i->images)[0];
            foreach ($this->cart as $j) {
                if($i->id === $j[0]){ $i['amount'] = $j[1]; }
            }            
            return $i;
        });

        $total = 0;
        foreach ($products as $i) { $total += $i['amount'] * $i['sale'];  }
        $this->total = $total;
        $this->products = $products;
    }

    // private function getProducts(){
    //     $this->cart = json_decode( Cookie::get('cart') );
    //     $ids = []; foreach ($this->cart as $i) { array_push($ids, $i[0]); }
    //     $products = Product::select('id', 'name', 'url', 'price', 'sale', 'images' )->whereIn('id', $ids)->get()->map(function($i) {
    //         $i['image']  =   json_decode( $i->images)[0];
    //         foreach ($this->cart as $j) {
    //             if($i->id === $j[0]){ $i['amount'] = $j[1]; }
    //         }            
    //         return $i;
    //     });
    //     return ($products);
    // }
}
