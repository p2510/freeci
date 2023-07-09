<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View;
use App\Models\Review;
use App\Models\Category;
use App\Http\Utils\Listing;
use App\Models\Recommended;
use Illuminate\Http\Request;
use App\Http\Utils\ShareSocial;
use Illuminate\Support\Facades\DB;


class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.freelancer-index')->with([
            'categories'=>Category::all(),
            'freelancers'=>DB::table('users')
                           ->join('freelancer_information','freelancer_information.user_id','=','users.id')
                           ->select('users.*','freelancer_information.*')
                           ->orderBy('users.created_at','desc')
                           ->paginate(6),
        ]);
    }
    public function onlineFreelancer()
    {
 
        return view('pages.search.freelancer-by-online')->with([
            'categories'=>Category::all(),
            'freelancers'=>DB::table('users')
                           ->where('visibility',1)
                           ->join('freelancer_information','freelancer_information.user_id','=','users.id')
                           ->select('users.*','freelancer_information.*')
                           ->orderBy('users.created_at','desc')
                           ->paginate(6),
        ]);
    }
    public function newFreelancer()
    {
        return view('pages.search.freelancer-by-new')->with([
            'categories'=>Category::all(),
            'freelancers'=>DB::table('users')
            ->where('visibility',1)
            ->join('freelancer_information','freelancer_information.user_id','=','users.id')
            ->select('users.*','freelancer_information.*')
            ->latest('users.created_at')
            ->limit(12)
            ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user,Request $request)
    {
        $freelancer=$user::where('users.id',$user->id)
                   ->join('freelancer_information','freelancer_information.user_id','=','users.id')
                   ->leftjoin('subscriptions','subscriptions.user_id','=','users.id')
                   ->select('users.*','freelancer_information.*','subscriptions.plan')
                   ->get()->map(function($item){
                    $item->skills=explode(',',$item->skills);
                    return $item;
                   }); 
        $countRecommended=Recommended::where('user_id',$user->id)->count();
        // add views 
        $getViews=View::where('ip',$request->ip())->where('user_id',$user->id)->count();
        if ($getViews==0) {
            $view = View::create([
                'user_id'=> $user->id,
                'ip'=>$request->ip()
            ]);
        }
                   
        return view('pages.user.freelancer-show')->with([
            'freelancer'=>$freelancer,
            'countRecommended'=>$countRecommended,
            'reviews'=>Review::where('user_id',$user->id)->orderBy('rating','desc')->latest()->limit(3)->get(),
            'shareUrl'=>ShareSocial::share(route('freelancer.show',$user->name),$user->name)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}