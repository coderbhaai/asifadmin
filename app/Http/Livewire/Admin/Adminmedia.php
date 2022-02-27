<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Media;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Adminmedia extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $cover_img;
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Media::select('id', 'name', 'updated_at')
                ->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.adminmedia',
            [
                'data' => $data
            ]
        );
    }

    public function sortBy($field){
        if($this->sortDirection == 'asc'){ $this->sortDirection = 'desc'; }else{ $this->sortDirection = 'asc'; }
        return $this->sortBy = $field;
    }

    public function openModal(){
        $this->resetInputFields();
        $this->isOpen = true;
    }

    private function resetInputFields(){
        $this->cover_img = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'cover_img' => 'required | image | max:2048',
        ]);
        $fileName1 = time().'-'.$this->cover_img->getClientOriginalName(); $this->cover_img->storeAs('public/media', $fileName1);
        Media::create([
            'name' => $fileName1,
        ]);
        $this->dispatchBrowserEvent('swal:modal', [ 'message' =>'Media Updated Successfully.', 'timer'=>3000 ]);
        $this->closeModal();
        $this->resetInputFields();
    }

    public function closeModal(){ $this->resetInputFields(); }
    public function updatingSearch(){ $this->resetPage(); }
}