<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request,User $user)
    {
       $validate=$request->validate([
          'rating'=>['required','integer','min:1','max:5'],
          'name'=>['max:100'],
          'title'=>['required','string','max:100'],
          'message'=>['required','string','min:10'],
       ]);
       $validate['user_id']=$user->id;
       Review::create($validate);
       
       session()->flash('success','success');
       
       return redirect()->back();
    }

    
}