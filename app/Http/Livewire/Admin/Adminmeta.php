<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Meta;
use Livewire\WithPagination;

class Adminmeta extends Component
{
    use WithPagination;
    public $url, $title, $description, $data_id;
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Meta::select('id', 'title', 'url', 'description', 'updated_at')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        return view('livewire.admin.adminmeta', 
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
        $this->url = '';
        $this->title = '';
        $this->description = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'url' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $url = strtolower( str_replace(' ', '-', $this->url) );

        Meta::updateOrCreate(['id' => $this->data_id], [
            'url' => $url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', $this->data_id ? 'Meta Updated Successfully.' : 'Meta Created Successfully.'); 
        $this->closeModal();
        $this->resetInputFields();
    }

    public function closeModal(){
        $this->resetInputFields();
    }

    public function edit($i){
        $this->url = $i['url'];
        $this->title = $i['title'];
        $this->description = $i['description'];
        $this->data_id = $i['id'];
        $this->isOpen = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}