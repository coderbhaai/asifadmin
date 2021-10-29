<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Auth;
use App\Models\Order;
use Livewire\WithPagination;

class Userorders extends Component
{
    use WithPagination;
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Order::leftJoin('users as a', function($join) { $join->on("orders.buyer", "=", "a.id"); })
                        ->where('orders.buyer', Auth::user()->id)
                        ->where('orders.type', 'Product')
                        ->select( 'orders.orderId', 'orders.id', 'orders.address', 'orders.cart as encodedCart', 'orders.amount', 'orders.discount', 'orders.status', 'orders.remarks', 'orders.updated_at', 'a.name', 'a.email' )
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);

        $data->getCollection()->transform(function ($i) {
            $i['cart']  =   json_decode( $i->encodedCart );
            return $i;
        });

        $courses =   Order::leftJoin('users as a', function($join) { $join->on("orders.buyer", "=", "a.id"); })
                        ->leftJoin('courses as b', function($join) { $join->on("orders.cart", "=", "b.id"); })
                        ->where('orders.type', 'Course')
                        ->select( 'orders.orderId', 'orders.id', 'orders.address', 'orders.buyer', 'orders.address as addr', 'orders.amount', 'orders.discount', 'orders.status', 'orders.remarks', 'orders.updated_at', 'a.name', 'a.email', 'b.name as courseName', 'b.url as courseUrl' )
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);

        return view('livewire.user.userorders', 
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

    public function updatingSearch(){ $this->resetPage(); }
}
