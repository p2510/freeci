<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mission;
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
                     ->leftjoin('subscriptions','subscriptions.user_id','=','users.id')
                     ->select('users.*','freelancer_information.*','subscriptions.plan')
                     ->get()
                     ->map(function($item){
                        $item->created_at=Carbon::parse($item->created_at)->locale('FR_fr')->diffForHumans();
                        return $item;
                       }); 
        $missions=Mission::orderBy('created_at','desc')
                    ->take(6)
                    ->get(); 


        return view('home')->with([
            'freelancers'=>$freelancers,
            'missions'=>$missions,
        ]);
    }
}