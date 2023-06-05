<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Notifications\NewReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReviewController extends Controller
{
    public function index()
    {

        return view('pages.freelancer.review.index')->with([
            'reviews'=>Review::where('user_id',Auth::user()->id)->latest()->paginate(3)
        ]);
    }
    

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
       Notification::send($user, new NewReview($request->name));
       
       return redirect()->back();
    }


    
}