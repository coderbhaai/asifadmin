<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use Cookie;
use App\Models\Product;
use App\Models\Course;

class Cart extends Component
{
    public $total = 0;
    public $coursebasket = [];
    public $productbasket = [];
    public $products = [];
    public $courses = [];
    // public $name, $email, $phone, $country, $state, $city, $address, $pin, $shipping;
    public $name = "Amit";
    public $email = "amit.khare588@gmail.com";
    public $phone = "8424003840";
    public $country = "India";
    public $state = "Haryana";
    public $city = "Gurgaon";
    public $address = "1172, Sec - 45";
    public $pin = "122002";


    public function mount(){        
        if( Cookie::get('coursebasket') || Cookie::get('productbasket') ){
            if(Cookie::get('coursebasket')){ $this->coursebasket = json_decode( Cookie::get('coursebasket') ); }
            if(Cookie::get('productbasket')){ $this->productbasket = json_decode( Cookie::get('productbasket') ); }

            $this->getProductsFromCart($this->coursebasket, $this->productbasket);
        }
        // dd($this->courses,  $this->products);
    }

    public function render(){
        return view('livewire.ecom.cart', 
            [
                'total'             =>  $this->total,
                'coursebasket'      =>  $this->coursebasket,
                'productbasket'     =>  $this->productbasket,
                'products'          =>  $this->products,
                'courses'           =>  $this->courses,
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

    private function getProductsFromCart( $coursebasket, $productbasket ){
        // dd($coursebasket, $productbasket);
        $productIds = []; foreach ($productbasket as $i) { array_push($productIds, $i[0]); }
        $products = Product::select('id', 'name', 'url', 'price', 'sale', 'images' )->whereIn('id', $productIds)->get()->map(function($i) {
            $i['image']  =   json_decode( $i->images)[0];
            foreach ($this->productbasket as $j) { if($i->id === $j[0]){ $i['amount'] = $j[1]; } }            
            return $i;
        });
        
        $courses = Course::select('id', 'name', 'url', 'price', 'sale', 'image' )->whereIn('id', $coursebasket)->get();

        $total = 0;
        foreach ($products as $i) { $total += $i['amount'] * $i['sale'];  }
        foreach ($courses as $i) { $total += $i['sale']; }

        $this->total = $total;
        $this->products = $products;
        $this->courses = $courses;
    }

    public function submit(){
        $buyer = [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "country" => $this->country,
            "state" => $this->state,
            "city" => $this->city,
            "address" => $this->address,
            "pin" => $this->pin,
        ];
        Cookie::queue( 'buyer', json_encode( $buyer ) );

        return redirect(route('checkout') ); 
    }

    public function notLoggedIn(){
        Cookie::queue( 'tocart', json_encode( true ) );
        return redirect('/login');
        
        // Changes made in config/fortify.php
    }
}
