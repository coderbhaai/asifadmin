<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PushNotification;
use Livewire\WithPagination;

class Notification extends Component
{
    use WithPagination;
    public $body;
    
    public $isOpen = 0;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = 50;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   PushNotification::select('id', 'body')->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.notification', [ "data" => $data ]);
    }   

    public function submit(){
        $this->validate([
            'body' => 'required'
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://animaboutiquenotify.herokuapp.com/api/notification',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'message='.$this->body,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        PushNotification::create([
            'body' => $this->body,
        ]);
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => $response, 'timer'=>3000 ]);
        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields(){
        $this->title = '';
        $this->body = '';
        $this->img = '';
        $this->isOpen = false;
    }

    public function closeModal(){ $this->resetInputFields(); }
    public function sortBy($field){
        if($this->sortDirection == 'asc'){ $this->sortDirection = 'desc'; }else{ $this->sortDirection = 'asc'; }
        return $this->sortBy = $field;
    }
    public function openModal(){ $this->resetInputFields(); $this->isOpen = true; }
    public function updatingSearch(){ $this->resetPage(); }
}
