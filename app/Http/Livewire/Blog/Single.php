<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Comments;

class Single extends Component
{
    public $url, $title, $blogId;
    public $comments = [];
    public $response = [];
    public $data;
    
    public function mount($url){
        $this->url =        $url;
        $this->data =       Blog::where('url', $url)->first();
        if($this->data != null){
            $this->title =      $this->data->title;
            $this->blogId =      $this->data->id;
            $this->comments =   Comments::where('blogId', $this->data->id)->where('c_order', 0)->get();
            $this->response =   Comments::where('blogId', $this->data->id)->where('c_order', 1)->get();
        }else{
            return redirect('/404');
        }
    }
    
    public function render(){
        return view('livewire.blog.single');
    }
}