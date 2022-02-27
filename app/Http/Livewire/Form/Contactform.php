<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Mail;
use App\Models\Contact;
use App\Mail\Contactmail;

class Contactform extends Component
{
    public $name, $email, $phone, $message;
    public $url = '';

    public function mount(){
        $url = str_replace("http://asifweb.test","", url()->current());
        $this->url = $url;
    }

    public function render(){
        return view('livewire.form.contactform');
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Contact::create([
            'url' =>  $this->url,
            'name' =>  $this->name,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
            'message' =>  $this->message,
        ]);

        $xx = [
            'name' =>  $this->name,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
            'message' =>  $this->message,
        ];

        $user_email = $this->email;
        Mail::to( $user_email)->cc('amit@amitkk.com')->send(new ContactMail($xx));

        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'Form Submitted Successfully.', 'timer'=>3000 ]);
        return redirect(route('thankyou') );
    }
}
