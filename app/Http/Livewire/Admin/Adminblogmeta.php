<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blogmeta;
use App\Models\Meta;
use Livewire\WithPagination;

class Adminblogmeta extends Component
{
    use WithPagination;
    public $url, $type, $name, $title, $description, $data_id, $metaId;
    public $isOpen = 0;
    public $sortBy = 'url';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Blogmeta::leftJoin('metas', function($join) { $join->on("metas.url", "=", "blogmetas.url"); })
                        ->select('blogmetas.id', 'blogmetas.type', 'blogmetas.url', 'blogmetas.name', 'blogmetas.updated_at', 'metas.id as metaId', 'metas.title', 'metas.description')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        return view('livewire.admin.adminblogmeta', 
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
        $this->type = '';
        $this->name = '';
        $this->title = '';
        $this->description = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'url' => 'required',
            'type' => 'required',
            'name' => 'required',
        ]);
        $url = strtolower( str_replace(' ', '-', $this->url) );
        
        Blogmeta::updateOrCreate(['id' => $this->data_id], [
            'url' =>  $url,
            'type' => $this->type,
            'name' => $this->name
        ]);
        Meta::updateOrCreate(['id' => $this->metaId], [
            'url' => $url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', $this->data_id ? 'Blog Meta Updated Successfully.' : 'Blog Meta Created Successfully.'); 
        $this->closeModal();
        $this->resetInputFields();
    }

    public function closeModal(){
        $this->resetInputFields();
    }

    public function edit($i){
        $this->url = $i['url'];
        $this->type = $i['type'];
        $this->name = $i['name'];
        $this->title = $i['title'];
        $this->description = $i['description'];
        $this->data_id = $i['id'];
        $this->metaId = $i['metaId'];
        $this->isOpen = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
} 