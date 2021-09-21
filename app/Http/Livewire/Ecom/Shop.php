<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Product;
use Cookie;

class Shop extends Component
{
    public $cart = [];
    public $perPage = 25;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function mount(){
        if(Cookie::get('cart')){
            $this->cart = json_decode( Cookie::get('cart') );
        }else{
            $this->cart = [];
        }
    }

    public function render(){
        $data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'price', 'sale', 'status', 'updated_at')
                        ->search($this->search)->paginate($this->perPage);

        $data->getCollection()->transform(function ($i) {
            $i['image']  =   json_decode( $i->images)[0];
            // $xx   =   Master::select('name', 'url')->whereIn('id', json_decode( $i->category ) )->get();
            // $catArray = [];
            // for ($j=0; $j <count($xx) ; $j++) { array_push( $catArray, $xx[$j] ); }
            // $i['catArray']  =   $catArray;

            // $y   =   Master::select('name', 'url')->whereIn('id', json_decode( $i->tag ) )->get();
            // $tagArray = [];
            // for ($j=0; $j <count($y) ; $j++) { array_push( $tagArray, $y[$j] ); }
            // $i['tagArray']  =   $tagArray;
            return $i;
        });
        return view('livewire.ecom.shop', 
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
                'cart'              =>  $this->cart
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
            }
        }else{
            $cart = [];
            array_push( $cart, [ $i['id'], 1 ] );
            Cookie::queue( 'cart', json_encode( $cart ) );
        }
    }

    private function addIncart($id){
        $cart = json_decode( Cookie::get('cart') );
        foreach ($cart as $key => $value) {
            if($value[0] === $id){
                $cart[$key][1] += 1;
                Cookie::queue( 'cart', json_encode( $cart ) );
                $this->cart = $cart;
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
                $cart[$key][1] -= 1;
                Cookie::queue( 'cart', json_encode( $cart ) );
                $this->cart = $cart;
            }
        }
    }
}