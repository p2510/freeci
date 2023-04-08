<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $freelancers=DB::table('users')
                     ->join('freelancer_information','freelancer_information.user_id','=','users.id')
                     ->select('users.*','freelancer_information.*')
                     ->get();
        User::all();
        return view('home')->with([
            'freelancers'=>$freelancers
        ]);
    }
}