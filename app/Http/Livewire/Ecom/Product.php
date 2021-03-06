<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Product as ProductModel;
use App\Models\Coursereview;
use Cookie;

class Product extends Component
{
    public $pid, $name, $url, $shortdesc, $longdesc, $price, $sale, $rating, $images, $activeImage;
    public $reviews = [];
    public $similar = [];

    public function mount($url){
        $this->data =       ProductModel::where('status', 1)->where('url', $url)->first();
        if($this->data != null){
            $this->similar =            ProductModel::where('status', 1)->where('id', '!=', $this->data->id)->Limit(6)->get()->map(function($i) {
                $i['image']  =   json_decode( $i->images)[0];
                return $i;
            });
            $this->pid =                $this->data->id;
            $this->name =               $this->data->name;
            $this->url =                $this->data->url;
            $this->shortdesc =          $this->data->shortdesc;
            $this->longdesc =           $this->data->longdesc;
            $this->price =              $this->data->price;
            $this->sale =               $this->data->sale;
            $this->rating =             json_decode( $this->data->rating );
            $this->images =             json_decode( $this->data->images );
            $this->activeImage =        json_decode( $this->data->images )[0];
            $this->reviews =            Coursereview::where('type', 'Product')->where('courseid', $this->data->id)->where('status', 1)->get();
        }else{
            return redirect('/404');
        }
    }

    public function render(){
        return view('livewire.ecom.product');
    }

    public function activeImage($index){
        $this->activeImage = $this->images[$index];
    }

    public function addToCart(){
        if(Cookie::get('productbasket')){
            $exists = $this->addIncart($this->data->id);
            if(!$exists){
                $productInCart = json_decode( Cookie::get('productbasket') );
                array_push( $productInCart, [ $this->data->id, 1 ] ); 
                Cookie::queue( 'productbasket', json_encode( $productInCart ) );                
                $this->sendCartNumber( $productInCart );
            }
        }else{
            $productInCart = [];
            array_push( $productInCart, [ $this->data->id, 1 ] );
            Cookie::queue( 'productbasket', json_encode( $productInCart ) );
            $this->sendCartNumber( $productInCart );
        }        
    }

    private function addIncart($id){
        $productInCart = json_decode( Cookie::get('productbasket') );
        foreach ($productInCart as $key => $value) {
            if($value[0] === $id){
                $productInCart[$key][1] += 1;
                Cookie::queue( 'productbasket', json_encode( $productInCart ) );
                $this->cart = $productInCart;
                $this->sendCartNumber( $productInCart );
                return true;
            }
        }
    }

    public function sendCartNumber($productbasket){
        $count = 0;        
        if(Cookie::get('productbasket')){ foreach ($productbasket as $i) { $count += $i[1]; } }
        if(Cookie::get('coursebasket')){ $count += count( json_decode( Cookie::get('coursebasket') ) ); }    
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'Cart Updated Successfully.', 'timer'=>3000 ]);    
        $this->emit('itemAdded', $count);
    }
}