<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Meta;
use App\Models\Master;
use App\Models\Product;
use Livewire\WithFileUploads;

class Addproduct extends Component
{
    use WithFileUploads;

    public $typeSelected, $catSelected, $tagSelected, $type, $name, $url, $shortdesc, $longdesc, $additional, $price, $sale, $rating, $status, $title, $description;

    public $images = [];

    public function render(){
        $typeOptions = Master::where('type', 'prodType')->select('id', 'name')->get();
        $tagOptions = Master::where('type', 'prodTag')->select('id', 'name')->get();
        $catOptions = Master::where('type', 'prodCat')->select('id', 'name')->get();
        return view('livewire.admin.addproduct', 
            [
                'typeOptions'              =>  $typeOptions,
                'tagOptions'               =>  $tagOptions,
                'catOptions'               =>  $catOptions,
            ]
        );
    }

    public function submit(){
        $cat = []; foreach($this->catSelected as $i){ array_push($cat, (int)$i); }
        $tag = []; foreach($this->tagSelected as $i){ array_push($tag, (int)$i); }
        
        $this->validate([
            'typeSelected' => 'required',
            'catSelected' => 'required',
            'tagSelected' => 'required',
            'name' => 'required',
            'url' => 'required',
            'shortdesc' => 'required',
            'longdesc' => 'required',
            'price' => 'required',
            'sale' => 'required',
            'title' => 'required',
            'description' => 'required',
            'images' => 'required',
        ]);

        $url = strtolower( str_replace(' ', '-', $this->url) );
        $img = [];

        foreach ($this->images as $key=>$i) {
            $name = time().'-'.$key.'-'.$i->getClientOriginalName(); $i->storeAs('public/product', $name);
            array_push( $img, $name );
        }

        Product::create([
            'type' =>  $this->typeSelected,
            'name' =>  $this->name,
            'url' =>  $url,
            'images' => json_encode($img),
            'category' => json_encode($cat),
            'tag' => json_encode($tag),
            'shortdesc' =>  $this->shortdesc,
            'longdesc' =>  $this->longdesc,
            'additional' =>  $this->additional,
            'price' =>  $this->price,
            'sale' =>  $this->sale,
            'rating' => json_encode( [0, 0] ),
            'status' => 1,
        ]);
        
        Meta::create([
            'url' => '/'.$url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', 'Product Created Successfully.');
        return redirect(route('adminproducts') );
    }
}