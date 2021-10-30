<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Meta;
use App\Models\Course;
use Livewire\WithFileUploads;

class Addcourse extends Component
{
    use WithFileUploads;

    public $name, $url, $image, $shortdesc, $longdesc, $price, $sale, $status, $title, $description;
    public $videos = [];

    public function render(){
        return view('livewire.admin.addcourse');
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'url' => 'required',
            'shortdesc' => 'required',
            'longdesc' => 'required',
            'price' => 'required',
            'sale' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $url = strtolower( str_replace(' ', '-', $this->url) );

        $fileName1 = time().'-'.$this->image->getClientOriginalName(); $this->image->storeAs('public/course', $fileName1);

        Course::create([
            'name' =>  $this->name,
            'url' =>  $url,
            'image' =>  $fileName1,
            'shortdesc' =>  $this->shortdesc,
            'longdesc' =>  $this->longdesc,
            'price' =>  $this->price,
            'sale' =>  $this->sale,
            'rating' => json_encode( [0, 0] ),
            'status' => 1,
            'videos' => json_encode( $this->videos )
        ]);
        
        Meta::create([
            'url' => '/'.$url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', 'Course created Successfully.');
        return redirect(route('admincourses') );
    }

    public function addVideo(){ array_push($this->videos, ['', '', '']); }
    public function removeVideo($id){ array_splice($this->videos, $id, 1); } 
}