<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Master;
use App\Models\Meta;

class Addproduct extends Component
{
    public $typeSelected, $catSelected, $tagSelected, $images, $type, $name, $url, $shortdesc, $longdesc, $price, $sale, $rating, $status, $title, $description;

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
            'type' => 'required',
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
        foreach ($this->images as $i) {
            $name = time().'-'.$loop->index.$i->getClientOriginalName(); $i->storeAs('public/product', $name);
            array_push( $img, $name );
        }
        $fileName2 = $this->smallImg->getClientOriginalName(); $this->smallImg->storeAs('public/blog', $fileName2);        

        Product::create([
            'type' =>  $this->typeSelected,
            'name' =>  $this->name,
            'url' =>  $url,
            'images' => json_encode($img),
            'category' => json_encode($cat),
            'tag' => json_encode($tag),
            'shortdesc' =>  $this->shortdesc,
            'longdesc' =>  $this->longdesc,
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
        session()->flash('message', 'Blog Created Successfully.');
        return redirect(route('adminblog') );
    }
}
