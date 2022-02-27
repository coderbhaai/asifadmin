<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\Coursereview;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;

class Reviewform extends Component
{
    public $courseid, $review, $type;
    public $star = 0;

    public function render(){
        return view('livewire.form.reviewform');
    }

    public function stars($star){ $this->star = $star; }

    public function submit(){
        $this->validate([
            'review' => 'required',
            'type' => 'required',
        ]);

        Coursereview::create([
            'type'      =>  $this->type,
            'courseid'  =>  $this->courseid,
            'userid' =>  Auth::user()->id,
            'review' => $this->review,
            'rating' => $this->star,
            'status' => 0,
        ]);
        $this->dispatchBrowserEvent('swal:modal', [ 'message' => 'Review submitted for approval.', 'timer'=>3000 ]);
        return redirect(route('thankyou') );
    }
}