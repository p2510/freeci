<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recommended;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(User $user)
    {
        $freelancer=$user::where('users.id',$user->id)
                   ->join('freelancer_information','freelancer_information.user_id','=','users.id')
                   ->select('users.*','freelancer_information.*')
                   ->get()->map(function($item){
                    $item->skills=explode(',',$item->skills);
                    return $item;
                   }); 
        $countRecommended=Recommended::where('user_id',$user->id)->count();
                     
        return view('freelancer.show')->with([
            'freelancer'=>$freelancer,
            'countRecommended'=>$countRecommended
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