<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Meta;
use App\Models\Master;
use App\Models\Product;
use Livewire\WithFileUploads;
use File;

class Updateproduct extends Component
{
    use WithFileUploads;

    public $typeSelected, $catSelected, $tagSelected, $type, $name, $url, $shortdesc, $longdesc, $price, $sale, $rating, $status, $title, $description, $oldimages, $data_id, $metaId;

    public $images = [];

    public function mount($id){
        $this->data_id = $id;
        $this->data =           Product::find($this->data_id);
        $meta =                 Meta::select('id','title', 'description')->where('url', '/'.$this->data->url)->first();
        $this->typeSelected =   $this->data->type;
        $this->name =           $this->data->name;
        $this->url =            $this->data->url;
        $this->catSelected =    json_decode($this->data->category);
        $this->tagSelected =    json_decode($this->data->tag);
        $this->oldimages =      json_decode($this->data->images);
        $this->shortdesc =      $this->data->shortdesc;
        $this->longdesc =       $this->data->longdesc;
        $this->price =          $this->data->price;
        $this->sale =           $this->data->sale;
        $this->status =         $this->data->status;
        if($meta){
            $this->metaId =         $meta->id;
            $this->title =          $meta->title;
            $this->description =    $meta->description;
        }
    }

    public function render(){
        $typeOptions = Master::where('type', 'prodType')->select('id', 'name')->get();
        $tagOptions = Master::where('type', 'prodTag')->select('id', 'name')->get();
        $catOptions = Master::where('type', 'prodCat')->select('id', 'name')->get();
        return view('livewire.admin.updateproduct', 
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
            'status' => 'required',
        ]);
        $url = strtolower( str_replace(' ', '-', $this->url) );
        $img = [];
        if(count($this->images)){
            foreach ($this->oldimages as $key=>$i) {
                $delete = public_path("storage/product/$i");
                if (isset($delete)) { file::delete($delete); }
            }
            foreach ($this->images as $key=>$i) {
                $name = time().'-'.$key.'-'.$i->getClientOriginalName(); $i->storeAs('public/product', $name);
                array_push( $img, $name );
            }
        }else{
            $img = $this->oldimages;
        }

        Product::where('id', $this->data_id)->update([
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
            'status' => $this->status,
        ]);
        
        Meta::where('id', $this->metaId)->update([
            'url' => '/'.$url,
            'title' => $this->title,
            'description' => $this->description
        ]);
        session()->flash('message', 'Product Updated Successfully.');
        return redirect(route('adminproducts') );
    }
}