<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blogmeta;
use App\Models\Blog;
use App\Models\Meta;

class Addblog extends Component
{
    use WithFileUploads;
    public $name, $url, $cover_img, $smallImg, $category, $tag, $content, $title, $description;
    public $catSelected = [];
    public $tagSelected = [];

    public function render(){
        $this->catOptions =     Blogmeta::select('id', 'name')->where('type', 'category')->get();
        $this->tagOptions =     Blogmeta::select('id', 'name')->where('type', 'tag')->get();
        return view('livewire.admin.addblog', 
            [
                'catOptions'                =>  $this->catOptions,
                'tagOptions'                =>  $this->tagOptions
            ]
        );
    }

    public function submit(){
        $cat = []; foreach($this->catSelected as $i){ array_push($cat, (int)$i); }
        $tag = []; foreach($this->tagSelected as $i){ array_push($tag, (int)$i); }

        $this->validate([
            'title' => 'required',
            'url' => 'required',
            'cover_img' => 'required | image | max:2048',
            'smallImg' => 'required | image | max:1024',
            'content' => 'required'
        ]);
        $url = strtolower( str_replace(' ', '-', $this->url) );

        $fileName1 = $this->cover_img->getClientOriginalName(); $this->cover_img->storeAs('public/blog', $fileName1);
        $fileName2 = $this->smallImg->getClientOriginalName(); $this->smallImg->storeAs('public/blog', $fileName2);        

        Blog::create([
            'title' =>  $this->name,
            'url' =>  $url,
            'category' => json_encode($cat),
            'tag' => json_encode($tag),
            'content' => $this->content,
            'cover_img' => $fileName1,
            'smallImg' => $fileName2
        ]);
        Meta::create([
            'url' => '/'.$url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', 'Blog Created Successfully.');
        return redirect(route('adminblog') );
    }    
}