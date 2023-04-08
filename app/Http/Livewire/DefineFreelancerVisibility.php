<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DefineFreelancerVisibility extends Component
{

    
    public $response;
    public function mount()
    {
        $this->response = Auth::user()->visibility;
    }
    public function toggle()
    {
        
        if (!Auth::user()->visibility) {
            User::where('id',Auth::user()->id)->update([
                'visibility'=>true
            ]);
        }else{
            User::where('id',Auth::user()->id)->update([
                'visibility'=>false
            ]);
        }
        $this->response++;
    }


    public function render()
    {
        return view('livewire.define-freelancer-visibility')->with([
            'response'=>$this->response,
            
        ]);
    }
}