<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class Adminorders extends Component
{
    use WithPagination;
    public $status, $remarks, $name, $data_id;
    public $address = [];
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Order::leftJoin('users as a', function($join) { $join->on("orders.buyer", "=", "a.id"); })
                        ->where('orders.type', 'Product')
                        ->select( 'orders.orderId', 'orders.id', 'orders.address', 'orders.buyer', 'orders.address as addr', 'orders.cart as encodedCart', 'orders.amount', 'orders.discount', 'orders.status', 'orders.remarks', 'orders.updated_at', 'a.name', 'a.email' )
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        $data->getCollection()->transform(function ($i) {
            $i['cart']  =   json_decode( $i->encodedCart );
            $i['address']  =   json_decode( $i->addr );
            return $i;
        });

        $courses =   Order::leftJoin('users as a', function($join) { $join->on("orders.buyer", "=", "a.id"); })
                        ->leftJoin('courses as b', function($join) { $join->on("orders.cart", "=", "b.id"); })
                        ->where('orders.type', 'Course')
                        ->select( 'orders.orderId', 'orders.id', 'orders.address', 'orders.buyer', 'orders.address as addr', 'orders.amount', 'orders.discount', 'orders.status', 'orders.remarks', 'orders.updated_at', 'a.name', 'a.email', 'b.name as courseName', 'b.url as courseUrl' )
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
        $courses->getCollection()->transform(function ($i) {
            $i['address']  =   json_decode( $i->addr );
            return $i;
        });
        
        return view('livewire.admin.adminorders', 
            [
                'data'              =>  $data,
                'courses'           =>  $courses,
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

    private function resetInputFields(){
        $this->status = '';
        $this->remarks = '';
        $this->name = '';
        $this->address = '';
        $this->data_id = '';
        $this->isOpen = false;
    }

    public function submit(){
        $this->validate([
            'status' => 'required',
            'remarks' => 'required',
        ]);
        Order::where('id', $this->data_id)->update([
            'status' => $this->status,
            'remarks' => $this->remarks
        ]);
        $this->closeModal();
        $this->resetInputFields();
        session()->flash('message', $this->data_id ? 'Order Updated Successfully.' : 'Order Created Successfully.');
    }

    public function closeModal(){ $this->resetInputFields(); }

    public function edit($i){
        $this->name = $i['name'];
        $this->address = $i['address'];
        $this->status = $i['status'];
        $this->remarks = $i['remarks'];
        $this->data_id = $i['id'];
        $this->isOpen = true;
    }

    public function updatingSearch(){ $this->resetPage(); }
}