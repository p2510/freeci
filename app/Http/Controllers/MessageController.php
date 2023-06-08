<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use App\Models\Mission;
use Illuminate\Http\Request;
use App\Models\MissionApplicant;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MessageController extends Controller
{
    // index message page 
    public function index_freelancer()
    {
      $missions=DB::table('mission_applicants')
      ->where('accepted',1)
      ->where('mission_applicants.user_id',Auth::user()->id)
      ->join('missions','missions.id','=','mission_applicants.mission_id')
      ->select('missions.*')
      ->get();
      $messages=[];
      
      if (count($missions)>0) {
         $messages=Message::where('mission_id',$missions[0]->id)
                           ->orderBy('created_at','asc')
                           ->get();
      }
      $user=User::find(Auth::id());
      $user->unreadNotifications()->update(['read_at' => now()]);
      return view('pages.freelancer.message.index')->with([
         'messages'=>$messages,
         'missions'=>$missions,
      ]);
    }
    
    public function index_recrutor(Mission $mission)
    {
      
       $messages=Message::where('mission_id',$mission->id)
                        ->orderBy('created_at','asc')
                        ->get();
                        
       $applicant=MissionApplicant::where('mission_id',$mission->id)->where('accepted',1)->first();
       $freelancer=User::find($applicant->user_id);
       return view('pages.recrutor.message.index')->with([
         'messages'=>$messages,
         'freelancer'=>$freelancer,
         'applicant'=>$applicant
       ]);
    }

    // show message by  freelancer 
    public function show(Mission $mission)
    {
         $messages=Message::where('mission_id',$mission->id)
                           ->orderBy('created_at','asc')
                           ->get();
 
         $missions=DB::table('mission_applicants')
                           ->where('accepted',1)
                           ->where('mission_applicants.user_id',Auth::user()->id)
                           ->join('missions','missions.id','=','mission_applicants.mission_id')
                           ->select('missions.*')
                           ->get();
                           
         return view('pages.freelancer.message.show')->with([
            'messages'=>$messages,
            'missions'=>$missions,
            'currentMission'=>$mission
         ]);
    }
    
    /* @var Request $request
       Store message by recrutor 
    */
    public function store_recrutor(Request $request)
    {
      
      $validate=$request->validate([
        'user_id'=>['required'],
        'mission_id'=>['required'],
        'content'=>['required','string'],
      ]);
      $validate['author']='recrutor';
      
      Message::create($validate);

      $user=User::find($validate['user_id']);
      Notification::send($user, new NewMessage());
      return redirect()->back();
      
    }
    public function store_freelancer(Request $request)
    {
      
      $validate=$request->validate([
        'user_id'=>['required'],
        'mission_id'=>['required'],
        'content'=>['required','string'],
      ]);
      $validate['author']='freelancer';
 
      Message::create($validate);
     
     
      return redirect()->back();
      
    }
}