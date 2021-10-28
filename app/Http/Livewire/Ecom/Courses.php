<?php

namespace App\Http\Livewire\Ecom;

use Livewire\Component;
use App\Models\Course;

class Courses extends Component
{
    public $perPage = 25;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];


    public function render(){
        $data =   Course::where('status', 1)->select('id', 'name', 'url', 'image', 'price', 'sale', 'videos', 'rating')->search($this->search)->paginate($this->perPage);
        $data->getCollection()->transform(function ($i) {
            $i['videoCount']  =   count( json_decode( $i->videos ) );
            $i['rate'] = json_decode( $i->rating );
            return $i;
        });
                        
        return view('livewire.ecom.courses', 
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }
}
