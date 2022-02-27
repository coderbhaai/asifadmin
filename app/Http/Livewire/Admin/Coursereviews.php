<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coursereview;

class Coursereviews extends Component
{
    public $status, $review, $data_id;
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Coursereview::leftJoin('courses as b', function($join) { $join->on("b.id", "=", "coursereviews.courseid"); })
                    ->leftJoin('users as c', function($join) { $join->on("c.id", "=", "coursereviews.userid"); })
                    ->leftJoin('products as d', function($join) { $join->on("d.id", "=", "coursereviews.courseid"); })
                    ->select('coursereviews.id', 'coursereviews.type', 'coursereviews.courseid', 'coursereviews.userid', 'coursereviews.review', 'coursereviews.rating', 'coursereviews.status', 'coursereviews.updated_at', 'b.name as courseName', 'b.url as courseUrl', 'c.name', 'c.email', 'd.name as productName', 'd.url as productUrl')
                    ->search($this->search)
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate($this->perPage);

        return view('livewire.admin.coursereviews', 
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

    public function openModal(){ $this->isOpen = true; }

    private function resetInputFields(){
        $this->data_id = '';
        $this->review = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'review' => 'required'
        ]);

        Coursereview::where('id', $this->data_id)->update([
            'review' => $this->review,
            'status' => $this->status,
        ]);
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'Review Updated Successfully.', 'timer'=>3000 ]);
        $this->closeModal();
        $this->resetInputFields();
    }

    
    public function edit($i){
        $this->data_id = $i['id'];
        $this->review = $i['review'];
        $this->status = $i['status'];
        $this->isOpen = true;
    }
    
    public function closeModal(){ $this->resetInputFields(); }
    public function updatingSearch(){ $this->resetPage(); }
}