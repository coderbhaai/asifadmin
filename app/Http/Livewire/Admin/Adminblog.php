<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Blogmeta;
use Livewire\WithPagination;

class Adminblog extends Component
{
    use WithPagination;    
    public $category = [];
    public $tag = [];
    public $sortBy = 'url';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Blog::select('id', 'title', 'url', 'smallImg', 'category', 'tag', 'updated_at')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        $this->category = Blogmeta::select('id', 'name', 'url')->where('type', 'category')->get();
        $this->tag = Blogmeta::select('id', 'name', 'url')->where('type', 'tag')->get();
        
        return view('livewire.admin.adminblog', 
            [
                'data'              =>  $data,
                'category'          =>  $this->category,
                'tag'               =>  $this->tag,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }

    public function sortBy($field){
        if($this->sortDirection == 'asc'){ $this->sortDirection = 'desc'; }else{ $this->sortDirection = 'asc'; }
        return $this->sortBy = $field;
    }

    public function updatingSearch(){ $this->resetPage(); }
}