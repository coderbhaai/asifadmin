<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use App\Models\Comments;

class Singlecomments extends Component
{
    public $title, $blogId, $name, $email, $comment, $comments, $response;
    public $isOpen = 0;
    public $c_order = 0;
    public $commentId = 0;

    public function mount($title, $blogId, $comments, $response){
        $this->title = $title;
        $this->blogId = $blogId;
        $this->comments = $comments;
        $this->response = $response;
    }

    public function render(){
        return view('livewire.parts.singlecomments');
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
        ]);

        Comments::create([
            'blogId' => $this->blogId,
            'c_order' => $this->c_order,
            'commentId' => $this->commentId,
            'user' =>  $this->name,
            'email' =>  $this->email,
            'comment' =>  $this->comment,
            'status' =>  0
        ]);
        $this->resetInputFields();
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'Comment sent for approval.', 'timer'=>3000 ]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->comment = '';
        $this->commentId = 0;
        $this->c_order = 0;
        $this->isOpen = false;
    }

    public function openModal($id){
        $this->commentId = $id;
        $this->c_order = 1;
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->resetInputFields();
    }
}