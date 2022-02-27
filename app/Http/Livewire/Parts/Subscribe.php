<?php

namespace App\Http\Livewire\Parts;

use Livewire\Component;
use Mail;
use App\Models\Subscribe as SubscriptionModel;
use App\Mail\Subscribemail;

class Subscribe extends Component
{
    public $email, $status;

    public function render(){
        return view('livewire.parts.subscribe');
    }

    public function submit(){        
        $this->validate([
            'email' => 'required'
        ]);
        SubscriptionModel::create([
            'email' =>  $this->email,
            'status' =>  1,
        ]);
        $user_email = $this->email;
        Mail::to( $user_email)->cc('amit@amitkk.com')->send(new Subscribemail);
        $this->email = '';
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'You subscribed Successfully.', 'timer'=>3000 ]);
        return redirect(route('thankyou') );
    }
}
