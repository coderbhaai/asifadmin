<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Adminusers extends Component
{
    use WithPagination;

    public $role, $status, $name, $data_id;
    public $isOpen = false;
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   User::select('id', 'name', 'email', 'role', 'status', 'updated_at')
                        ->search($this->search)
                        ->paginate($this->perPage);
        return view('livewire.admin.adminusers',
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }

    public function openModal($i){
        $this->role = $i['role'];
        $this->status = $i['status'];
        $this->name = $i['name'];
        $this->data_id = $i['id'];
        $this->isOpen = true;
    }

    public function closeModal(){ $this->resetInputFields(); }

    private function resetInputFields(){
        $this->role = '';
        $this->status = '';
        $this->name = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'role' => 'required',
            'status' => 'required',
        ]);

        User::where( 'id', $this->data_id )->update([
            'role' => $this->role,
            'status' => $this->status,
        ]);

        session()->flash('message', 'User Updated Successfully.'); 
        $this->closeModal();
    }
}

