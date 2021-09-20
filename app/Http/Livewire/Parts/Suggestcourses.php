<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use App\Models\Course;

class Suggestcourses extends Component
{
    public $data;

    public function render(){
        $this->data =   Course::select('id', 'name', 'url', 'image', 'price', 'sale', 'videos', 'rating')->inRandomOrder()->limit(6)->get()->map(function($i) {
            $i['videoCount']  =   count( json_decode( $i->videos ) );
            $i['rate'] = json_decode( $i->rating );
            return $i;
        });
        return view('livewire.parts.suggestcourses');
    }
}
