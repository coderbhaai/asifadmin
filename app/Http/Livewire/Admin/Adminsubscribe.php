<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subscribe;
use Livewire\WithPagination;

class Adminsubscribe extends Component
{
    use WithPagination;
    
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Subscribe::select('id', 'email', 'status', 'updated_at')
                        ->search($this->search)
                        ->paginate($this->perPage);
        return view('livewire.admin.adminsubscribe',
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }

    public function updatingSearch(){ $this->resetPage(); }
}
