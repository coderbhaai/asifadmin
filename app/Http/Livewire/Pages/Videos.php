<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Marketing;

class Videos extends Component
{
    public function mount(){
    }
    
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = 10;
    public $search = '';

    public function loadMore(){
        $this->perPage += 10;
    }

    public function render(){
        $data = Marketing::select('id', 'heading', 'video')->where('status', 1)
                        ->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.pages.videos',
            [
                'data' => $data
            ]
        );
    }
}
