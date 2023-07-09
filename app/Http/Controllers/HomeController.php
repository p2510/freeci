<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mission;
use App\Http\Utils\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
       
        $freelancers= Cache::remember('freelancers', now()->addhours(72), function () {
                        return DB::table('users')
                                ->join('freelancer_information','freelancer_information.user_id','=','users.id')
                                ->leftjoin('subscriptions','subscriptions.user_id','=','users.id')
                                ->select('users.*','freelancer_information.*','subscriptions.plan')
                                ->get()
                                ->map(function($item){
                                $item->created_at=Carbon::parse($item->created_at)->locale('FR_fr')->diffForHumans();
                                return $item;
                                });
                   });
        $missions=Cache::remember('missions', now()->addhours(24), function () { 
                        return Mission::orderBy('created_at','desc')
                            ->take(6)
                            ->get(); 
                   });
            
        return view('home')->with([
            'freelancers'=>$freelancers,
            'missions'=>$missions,
        ]);
    }
    
    
    public function search(Request $request)
    {
        $missions=Mission::where('title','LIKE','%'.$request->search.'%')->orWhere('category','LIKE','%'.$request->search.'%')->paginate(9);
        if(count($missions)===0 || !$request->filled('search')){
            return redirect()->route('mission.index');
        }
        return view('pages.search.home-search')->with([
           'categories'=>Listing::domain(),
           'missions'=>$missions,
        ]);
    }
}