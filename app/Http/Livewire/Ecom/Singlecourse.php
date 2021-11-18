<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use Cookie;

use App\Models\Course;
use App\Models\Coursereview;

class Singlecourse extends Component
{

    public $name, $url, $shortdesc, $longdesc,$price, $sale, $rating, $image;
    public $videos = [];
    public $reviews = [];
    public $similar = [];

    public function mount($url){
        $this->data =       Course::where('status', 1)->where('url', $url)->first();
        if($this->data != null){
            $this->similar =            Course::where('status', 1)->where('id', '!=', $this->data->id)->Limit(6)->get();
            $this->name =               $this->data->name;
            $this->url =                $this->data->url;
            $this->shortdesc =          $this->data->shortdesc;
            $this->longdesc =           $this->data->longdesc;
            $this->price =              $this->data->price;
            $this->sale =               $this->data->sale;
            $this->image =               $this->data->image;
            $this->rating =             json_decode( $this->data->rating );
            $this->videos =             json_decode( $this->data->videos );
            $this->reviews =            Coursereview::where('type', 'Course')->where('courseid', $this->data->id)->where('status', 1)->get();
        }else{
            return redirect('/404');
        }
    }

    public function render(){
        return view('livewire.ecom.singlecourse');
    }

    public function addToCart($id){
        if(Cookie::get('coursebasket')){
            $courseInCart = json_decode( Cookie::get('coursebasket') );
            if( !in_array($id, $courseInCart) ){
                array_push( $courseInCart, $id );
                Cookie::queue( 'coursebasket', json_encode( $courseInCart ) );
                $this->sendCartNumber( $courseInCart );
                session()->flash('message', 'Cart Updated Successfully.');
            }else{
                session()->flash('message', 'Course exists in cart');
            }
        }else{
            Cookie::queue( 'coursebasket', json_encode( [$id] ) ); 
            $this->sendCartNumber( [$id] );
            session()->flash('message', 'Cart Updated Successfully.');
        }
        
    }

    public function sendCartNumber($coursebasket){
        $count = count( $coursebasket );
        
        if(Cookie::get('productbasket')){
            $productbasket = json_decode( Cookie::get('productbasket') );
            if( count( $productbasket ) ){ foreach ($productbasket as $i) { $count += $i[1]; } }
        }

        $this->emit('itemAdded', $count);
    }
}
