<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Master;
use App\Models\Meta;
use Livewire\WithPagination;

class Adminmaster extends Component
{
    use WithPagination;
    public $type, $name, $tab1, $tab2, $url, $data_id;
    public $isOpen = 0;
    public $sortBy = 'url';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];


    public function render(){
        $data =   Master::leftJoin('masters as b', function($join) { $join->on("masters.id", "=", "b.tab1"); })
                        ->leftJoin('masters as c', function($join) { $join->on("masters.id", "=", "c.tab2"); })
                        ->select('masters.id', 'masters.type', 'masters.name', 'masters.tab1', 'masters.tab2', 'masters.url', 'masters.updated_at')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);

        return view('livewire.admin.adminmaster', 
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

    public function openModal(){
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->type = '';
        $this->name = '';
        $this->tab1 = '';
        $this->tab2 = '';
        $this->url = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'type' => 'required',
            'name' => 'required',
        ]);
        $url = strtolower( str_replace(' ', '-', $this->url) );
        
        Master::updateOrCreate(['id' => $this->data_id], [
            'type' => $this->type,
            'name' => $this->name,
            'tab1' => $this->tab1,
            'tab2' => $this->tab2,
            'url'  => $url,
        ]);
        session()->flash('message', $this->data_id ? 'Master Updated Successfully.' : 'Master Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($i){
        $this->type = $i['type'];
        $this->name = $i['name'];
        $this->tab1 = $i['tab1'];
        $this->tab2 = $i['tab2'];
        $this->url = $i['url'];
        $this->data_id = $i['id'];
        $this->isOpen = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
