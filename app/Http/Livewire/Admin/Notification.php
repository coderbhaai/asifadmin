<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PushNotification;
use Livewire\WithPagination;

class Notification extends Component
{
    use WithPagination;
    // public $title, $body, $img;
    public $title = 'qqqqqqqqqqqqq';
    public $body = "wwwwwwwwwwwww";
    
    public $isOpen = 1;
    public $sortBy = 'id';
    public $sortDirection = 'desc';
    public $perPage = 50;
    public $search = '';
    public $perPageOptions = [10,25,50,100,1000];

    public function render(){
        $data =   PushNotification::select('id', 'title', 'body', 'img')->search($this->search)->orderBy($this->sortBy, $this->sortDirection)->paginate($this->perPage);
        return view('livewire.admin.notification', [ "data" => $data ]);
    }   

    public function submit(){
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        PushNotification::create([
            'title' =>  $this->title,
            'body' => $this->body,
        ]);

        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => 1,'status'=>"done");
        $notification = array('title' =>$this->title, 'text' => $this->body, 'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "/topics/all", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: key=' . "AAAAJk3OBLc:APA91bGIZD0gjij_8SN6WCyA4iSdLwP6zhj1sodxzIoQhocFhiwroWUlfzNHaUI-YQYNDP9CzdNt4FubkKwZiTCEz4tH6keBONsnk0wpjXtB7MNmSiEkrZcjcminw5zRxddSNG99YqS-GDz05D5TeoEEAGXP8uncZQ",
            'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );

        dd($result);
        //var_dump($result);
        curl_close ( $ch );

        dd("End");
        session()->flash('message', 'Notification Sent Successfully.'); 
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
