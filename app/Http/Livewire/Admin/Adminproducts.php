<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Master;
use App\Models\Product;
use Livewire\WithPagination;

class Adminproducts extends Component
{
    use WithPagination;
    public $sortBy = 'url';
    public $sortDirection = 'asc';
    public $perPage = 10;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   Product::select('id', 'name', 'url', 'images', 'category', 'tag', 'status', 'updated_at')
                        ->search($this->search)
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);

        $data->getCollection()->transform(function ($i) {
            $i['image']  =   json_decode( $i->images)[0];

            $xx   =   Master::select('name', 'url')->whereIn('id', json_decode( $i->category ) )->get();
            $catArray = [];
            for ($j=0; $j <count($xx) ; $j++) { array_push( $catArray, $xx[$j] ); }
            $i['catArray']  =   $catArray;

            $y   =   Master::select('name', 'url')->whereIn('id', json_decode( $i->tag ) )->get();
            $tagArray = [];
            for ($j=0; $j <count($y) ; $j++) { array_push( $tagArray, $y[$j] ); }
            $i['tagArray']  =   $tagArray;

            return $i;
        });
        return view('livewire.admin.adminproducts', 
            [
                'data'              =>  $data,
                'perPageOptions'    =>  $this->perPageOptions,
            ]
        );
    }
}
