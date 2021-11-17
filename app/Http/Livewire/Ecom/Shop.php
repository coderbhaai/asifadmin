<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Product;
use App\Models\Master;
use Cookie;

class Shop extends Component
{
    public $data = [];
    public $perPage = 25;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function mount(){
        if(request()->routeIs('shop')){
            $this->title  = 'Shop';
            $this->data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'price', 'sale', 'status', 'updated_at')->get();
            ;
        }else if(request()->routeIs('search')){
            $xx = strtok(request()->path(), '/');
            $index = strpos($xx, '-') + strlen('-');
            $type = substr($xx, $index);
            $url = substr( strstr(request()->path(), '/'), 1);
            $this->title  = 'You searched for '.$url;
            $this->data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'price', 'sale', 'updated_at')
                                    ->where('status', 1)->where('name', 'like', '%'.$url.'%')->get();
        }else{
            $xx = strtok(request()->path(), '/');
            $index = strpos($xx, '-') + strlen('-');
            $type = substr($xx, $index);
            $url = substr( strstr(request()->path(), '/'), 1);
            $id   =   Master::select('id', 'name')->where('url', $url )->first();
            // dd($type);
            if($id != null){
                $this->title  = 'Product of '.ucfirst($type).' '.$id->name;
                if($type === 'type'){
                    $this->data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'price', 'sale', 'updated_at')
                                    ->where('status', 1)->where('type', $id->id)->get();
                }else{
                    $this->data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'price', 'sale', 'updated_at')
                                    ->where('status', 1)->whereJsonContains($type, $id->id)->get();
                }
            }else{
                return redirect('/404'); 
            }
        }
    }

    public function render(){        
        return view('livewire.ecom.shop');
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
}