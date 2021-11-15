<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Comments;
use Livewire\WithPagination;

class Admincomments extends Component
{
    use WithPagination;
    public $user, $email, $comment, $status, $data_id;
    public $isOpen = 0;
    public $sortBy = 'url';
    public $sortDirection = 'asc'; 
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Comments::leftJoin('blogs', function($join) { $join->on("blogs.id", "=", "comments.blogId"); })
                        ->select('comments.id', 'comments.blogId', 'comments.user', 'comments.email', 'comments.comment', 'comments.status', 'comments.updated_at', 'blogs.url', 'blogs.title')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        return view('livewire.admin.admincomments', 
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }

    public function sortBy($field){
        if($this->sortDirection == 'asc'){ $this->sortDirection = 'desc'; }else{ $this->sortDirection = 'asc'; }
        return $this->sortBy = $field;
    }

    private function resetInputFields(){
        $this->user = '';
        $this->email = '';
        $this->comment = '';
        $this->status = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'user' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'status' => 'required',
        ]);
        Comments::updateOrCreate(['id' => $this->data_id], [
            'user' => $this->user,
            'email' => $this->email,
            'comment' => $this->comment,
            'status' => $this->status
        ]);
        session()->flash('message', 'Comment Updated Successfully.');
        $this->resetInputFields();
    }

    public function closeModal(){
        $this->resetInputFields();
    }

    public function edit($i){
        $this->user = $i['user'];
        $this->email = $i['email'];
        $this->comment = $i['comment'];
        $this->status = $i['status'];
        $this->data_id = $i['id'];
        $this->isOpen = true;
    }

    public function updatingSearch(){ $this->resetPage(); }
}