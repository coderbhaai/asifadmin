<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Marketing;
use Livewire\WithPagination;

class Adminmarketing extends Component
{
    use WithPagination;
    public $video, $heading, $description, $status, $data_id;
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Marketing::select('id', 'heading', 'video', 'description', 'status', 'updated_at')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        return view('livewire.admin.adminmarketing', 
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }

    public function sortBy($field){
        if($this->sortDirection == 'asc'){
            $this->sortDirection = 'desc';
        }else{
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $field;
    }

    public function openModal(){
        $this->resetInputFields();
        $this->isOpen = true;
    }

    private function resetInputFields(){
        $this->video = '';
        $this->heading = '';
        $this->description = '';
        $this->status = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'video' => 'required',
            'heading' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);
        Marketing::updateOrCreate(['id' => $this->data_id], [
            'video' => $this->video,
            'heading' => $this->heading,
            'description' => $this->description,
            'status' => $this->status
        ]);
        session()->flash('message', $this->data_id ? 'Marketing Updated Successfully.' : 'Marketing Created Successfully.'); 
        $this->closeModal();
        $this->resetInputFields();
    }

    public function closeModal(){ $this->resetInputFields(); }

    public function edit($i){
        $this->video = $i['video'];
        $this->heading = $i['heading'];
        $this->description = $i['description'];
        $this->status = $i['status'];
        $this->data_id = $i['id'];
        $this->isOpen = true;
    }

    public function updatingSearch(){ $this->resetPage(); }
}
