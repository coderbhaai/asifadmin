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
            if(Cookie::get('coursebasket')){ $this->coursebasket = json_decode( Cookie::get('coursebasket') ); }else{ $this->coursebasket = []; }
            if(Cookie::get('productbasket')){ $this->productbasket = json_decode( Cookie::get('productbasket') ); }else{ $this->productbasket = []; }
            $this->getProductsFromCart();
        }
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
        if(Cookie::get('productbasket')){
            $exists = $this->addIncart($i['id']);
            session()->flash('message', 'Cart Updated Successfully.');
            if(!$exists){ 
                $productInCart = json_decode( Cookie::get('productbasket') );
                array_push( $productInCart, [ $i['id'], 1 ] ); 
                $this->cart = $productInCart;
                Cookie::queue( 'productbasket', json_encode( $productInCart ) );
                $this->productbasket = $productInCart;
                $this->getProductsFromCart();
                $this->sendCartNumber( $this->coursebasket, $productInCart);
            }
        }else{
            $productInCart = [];
            array_push( $productInCart, [ $i['id'], 1 ] );
            Cookie::queue( 'productbasket', json_encode( $productInCart ) );
            $this->productbasket = $productInCart;
            $this->getProductsFromCart();
            $this->sendCartNumber( $this->coursebasket, $productInCart);
        }        
    }

    private function addIncart($id){
        $productInCart = json_decode( Cookie::get('productbasket') );
        foreach ($productInCart as $key => $value) {
            if($value[0] === $id){
                $productInCart[$key][1] += 1;
                Cookie::queue( 'productbasket', json_encode( $productInCart ) );
                $this->productbasket = $productInCart;
                $this->getProductsFromCart();
                $this->sendCartNumber( $this->coursebasket, $productInCart);
                return true;
            }
        }
    }

    public function removeCourseFromCart($id){
        if(Cookie::get('coursebasket')){
            $courseInCart = json_decode( Cookie::get('coursebasket') );
            foreach ( $courseInCart as $key => $value ) {
                if($value === $id){ 
                    array_splice($courseInCart, $key, 1);
                    Cookie::queue( 'coursebasket', json_encode( $courseInCart ) );
                    $this->coursebasket = $courseInCart;
                    $this->getProductsFromCart();
                    $this->sendCartNumber( $courseInCart, $this->productbasket);
                }
            }
            session()->flash('message', 'Cart Updated Successfully.');
        }
    }

    public function removeProductFromCart($id){
        if(Cookie::get('productbasket')){
            $productInCart = json_decode( Cookie::get('productbasket') );
            foreach ( $productInCart as $key => $value ) {
                if($value[0] === $id){
                    if($productInCart[$key][1] === 1){ array_splice($productInCart, $key, 1); }else{ $productInCart[$key][1] -= 1; }
                    Cookie::queue( 'productbasket', json_encode( $productInCart ) );
                    $this->productbasket = $productInCart;
                    $this->getProductsFromCart();
                    $this->sendCartNumber( $this->coursebasket, $productInCart);
                }
            }
        }
    }

    private function getProductsFromCart(){
        $productIds = []; foreach ($this->productbasket as $i) { array_push($productIds, $i[0]); }
        $products = Product::select('id', 'name', 'url', 'price', 'sale', 'images' )->whereIn('id', $productIds)->get()->map(function($i) {
            $i['image']  =   json_decode( $i->images)[0];
            foreach ( $this->productbasket as $j ) { if($i->id == $j[0]){ $i['amount'] = $j[1];  }  }
            return $i;
        });
        
        $courses = Course::select('id', 'name', 'url', 'price', 'sale', 'image' )->whereIn('id', $this->coursebasket)->get();

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

    public function sendCartNumber( $coursebasket, $productbasket ){
        $count = 0;
        if(Cookie::get('productbasket')){ foreach ($productbasket as $i) { $count += $i[1]; } }
        if(Cookie::get('coursebasket')){ $count += count( $coursebasket );         }
        $this->emit('itemAdded', $count);
    }
}
