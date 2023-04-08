<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Recommended;


class Recommend extends Component
{
    public $email;
    public $user_id;

    public function __construct(int|string $user_id)
    {
        $this->user_id=$user_id;
    }
 
    protected $rules = [
        'email' => ['required','email'],
        'user_id' => ['required','integer'],
    ];
    
    public function submit():void
    {
        $this->validate();
        Recommended::create([
            'email'=>$this->email,
            'user_id' => $this->user_id
        ]);
        
    }
    public function updated($email)
    {
        $this->validateOnly($email, [
            'email' => ['required','email'],
        ]);
    }
    public function render()
    {
        return view('livewire.recommend');
    }
}