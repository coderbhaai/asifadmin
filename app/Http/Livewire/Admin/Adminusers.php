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
        $data =   User::leftJoin('profiles as a', function($join) { $join->on("a.userId", "=", "users.id"); })
                        ->select('users.id', 'users.name', 'users.email', 'users.role', 'users.status', 'users.updated_at', 'a.address as addr')
                        ->search($this->search)
                        ->paginate($this->perPage);

        $data->getCollection()->transform(function ($i) {
            if($i->addr){
                $i['address']  =   json_decode( $i->addr);
            }else{
                $i['address'] = [];
            }
            return $i;
        });
        
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
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'User Updated Successfully.', 'timer'=>3000 ]);
        $this->closeModal();
    }
}

