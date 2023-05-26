<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use App\Models\MissionApplicant;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{

    public function create()
    {
       return view('pages.recrutor.tracking-code.create');
    }
    
    public function store(Request $request)
    {
       
        $validate=$request->validate([
            'code'=>['required','string','exists:App\Models\Mission,code']
        ]);
        
        $mission=Mission::where('code',$validate['code'])->first();

        $applicants=DB::table('mission_applicants')
                ->where('mission_id',$mission->id)
                ->join('users','users.id','=','mission_applicants.user_id') 
                ->select('mission_applicants.budget','mission_applicants.accepted','mission_applicants.user_id','users.name','users.email','users.profil_photo')
                ->get();
        
        //redirect if misison has been accepted  
        
        $isAccepted = $applicants->where('accepted',1)->count();
        if ($isAccepted==1) {
         
         return view('pages.recrutor.tracking-code.accepted')->with(['mission_title'=>$mission->title]);
        }
     
        return view('pages.recrutor.tracking-code.show')->with(['mission'=>$mission,'applicants'=>$applicants]);
    }

    public function accepted(Request $request)
    {
        $validate=$request->validate([
            'user_id'=>['required']
        ]);
        DB::table('mission_applicants')
           ->where('user_id',$validate['user_id'])
           ->update([
            'accepted'=>'1'
        ]);
           
           return view('pages.recrutor.tracking-code.accepted');
    }
    

    
   
}