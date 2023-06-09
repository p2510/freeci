<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Newsletter;

class SubscriptionNewsletter extends Component
{
    public $email;
    public $status_newsletter =false;
    protected $rules = [
        'email' => ['required','email','unique:App\Models\Newsletter'],
    ];

    public function submit():void
    {
        $this->validate();
        Newsletter::create([
            'email'=>$this->email,
        ]);
        $this->status_newsletter =true;
        
    }
    

    
    public function render()
    {
        return view('livewire.subscription-newsletter');
    }
}