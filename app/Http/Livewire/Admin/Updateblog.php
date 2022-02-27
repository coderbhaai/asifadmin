<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blogmeta;
use App\Models\Blog;
use App\Models\Meta;
use File;

class Updateblog extends Component
{
    use WithFileUploads;
    public $data_id, $metaId, $name, $url, $cover_img, $smallImg, $category, $tag, $content, $title, $description, $oldcover_img, $oldsmallImg;
    public $catSelected = [];
    public $tagSelected = [];

    public function mount($id){
        $this->data_id = $id;
        $this->data =           Blog::find($this->data_id);
        $meta =                 Meta::select('id','title as metaTitle', 'description')->where('url', '/'.$this->data->url)->first();
        $this->name =           $this->data->title;
        $this->url =            $this->data->url;
        $this->content =        $this->data->content;
        $this->oldcover_img =   $this->data->cover_img;
        $this->oldsmallImg =    $this->data->smallImg;
        $this->catSelected =    json_decode($this->data->category);
        $this->tagSelected =    json_decode($this->data->tag);
        if($meta){
            $this->metaId =         $meta->id;
            $this->title =          $meta->metaTitle;
            $this->description =    $meta->description;
        }
    }
    
    public function render(){
        $this->catOptions =     Blogmeta::select('id', 'name')->where('type', 'category')->get();
        $this->tagOptions =     Blogmeta::select('id', 'name')->where('type', 'tag')->get();

        return view('livewire.admin.updateblog', 
            [
                'catOptions'                =>  $this->catOptions,
                'tagOptions'                =>  $this->tagOptions
            ]
        );
    }

    public function submit(){
        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'content' => 'required'
        ]);
        $url = str_replace(' ', '-', $this->url);

        if($this->cover_img){
            $delete = public_path("storage/blog/$this->oldcover_img");
            if (isset($delete)) { 
                file::delete($delete); 
                $fileName1 = $this->cover_img->getClientOriginalName(); 
                $this->cover_img->storeAs('public/blog', $fileName1);
            }
        }else{
            $fileName1 = $this->oldcover_img;
        }

        if($this->smallImg){
            $delete = public_path("storage/blog/$this->oldsmallImg");
            if (isset($delete)) { 
                file::delete($delete); 
                $fileName2 = $this->smallImg->getClientOriginalName(); $this->smallImg->storeAs('public/blog', $fileName2);
            }
        }else{
            $fileName2 = $this->oldsmallImg;
        } 

        Blog::updateOrCreate(['id' => $this->data_id], [
            'title' =>  $this->name,
            'url' =>  $url,
            'category' => json_encode($this->catSelected),
            'tag' => json_encode($this->tagSelected),
            'content' => $this->content,
            'cover_img' => $fileName1,
            'smallImg' => $fileName2
        ]);

        Meta::updateOrCreate(['id' => $this->metaId], [
            'url' => '/'.$url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'Blog Updated Successfully.', 'timer'=>3000 ]);

        return redirect(route('adminblog') );
    }
    
}
