<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Meta;
use App\Models\Course;
use Livewire\WithFileUploads;

class Updatecourse extends Component
{
    use WithFileUploads;

    public $name, $url, $image, $shortdesc, $longdesc, $price, $sale, $status, $title, $description, $oldimage, $data_id, $metaId;

    public function mount($id){
        $this->data_id = $id;
        $this->data =           Course::find($this->data_id);
        $meta =                 Meta::select('id','title', 'description')->where('url', '/'.$this->data->url)->first();
        $this->name =           $this->data->name;
        $this->url =            $this->data->url;
        $this->oldimage =       $this->data->image;
        $this->shortdesc =      $this->data->shortdesc;
        $this->longdesc =       $this->data->longdesc;
        $this->price =          $this->data->price;
        $this->sale =           $this->data->sale;
        $this->status =         $this->data->status;
        if($meta){
            $this->metaId =         $meta->id;
            $this->title =          $meta->title;
            $this->description =    $meta->description;
        }
    }

    public function render(){
        return view('livewire.admin.updatecourse');
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
            'status' => 'required',
        ]);

        $url = strtolower( str_replace(' ', '-', $this->url) );

        if($this->image){
            $delete = public_path("storage/course/$this->oldimage");
            if (isset($delete)) { 
                file::delete($delete); 
                $fileName1 = time().'-'.$this->image->getClientOriginalName(); 
                $this->image->storeAs('public/course', $fileName1);
            }
        }else{
            $fileName1 = $this->oldimage;
        }

        Course::where('id', $this->data_id)->update([
            'name' =>  $this->name,
            'url' =>  $url,
            'image' =>  $fileName1,
            'shortdesc' =>  $this->shortdesc,
            'longdesc' =>  $this->longdesc,
            'price' =>  $this->price,
            'sale' =>  $this->sale,
            'rating' => json_encode( [0, 0] ),
            'status' => $this->status,
        ]);
        
        Meta::where('id', $this->metaId)->update([
            'url' => '/'.$url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', 'Course created Successfully.');
        return redirect(route('admincourses') );
    }
}
