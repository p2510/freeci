<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Utils\ShareSocial;
use Illuminate\Validation\Rule;
use App\Models\MissionApplicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        $missions=Cache::remember('all_missions', now()->addhours(12), function () { 
            return Mission::orderBy('created_at','desc')->paginate(9);
        });
        return view('pages.user.mission-index')->with([
            'categories'=>Category::all(),
            'missions'=>$missions,
        ]);
    }
    
    public function search(Request $request)
    {

        $validate=$request->validate([
            'category' =>['string'],
            'skill'=>[]
        ]);

       if($validate['category']=='All'){
            $data=Mission::where('tags','LIKE', '%'.$validate['skill'].'%')->paginate(9);
        }else{            
            $data=Mission::where('category', $validate['category'])->where('tags','LIKE', '%'.$validate['skill'].'%')->paginate(9);
        }
     
        return view('pages.search.mission')->with([
            'categories'=>Category::all(),
            'missions'=>$data,
        ]);
    }
    
    public function recent()
    {

        return view('pages.user.mission-recent')->with([
            'categories'=>Category::all(),
            'missions'=>Mission::orderBy('created_at','desc')->limit(16)->get(),
 
        ]);
    }
    public function featured()
    {
   
        return view('pages.user.mission-featured')->with([
            'categories'=>Category::all(),
            'missions'=>Mission::orderBy('budget_max','desc')->limit(16)->get()
 
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('pages.recrutor.mission.create')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>['required','string','max:150'],
            'description'=>['required','string','min:12'],
            'type_mission'=>['required','string', Rule::in(['1', '2'])],
            'type_budget'=>['required','string',Rule::in(['1', '2'])],
            'category'=>['required','string','max:100'],
            'budget_max'=>['required','integer','min:100'],
            'budget_min'=>['required','integer','min:100'],
            'tags'=>[],
            'phone'=>['required','digits:10','']
        ]);
  
        $data['code']=Str::uuid();
        $data['statut']=true;
       
        Mission::create($data);
        return redirect()->back()->with('code',$data['code']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        $applied=MissionApplicant::where('user_id',Auth::user()->id)->where('mission_id',$mission->id)->count();
        $applicants=DB::table('mission_applicants')
                        ->where('mission_id',$mission->id)
                        ->join('users','users.id','=','mission_applicants.user_id')
                        ->select('mission_applicants.*','users.name','users.profil_photo')
                        ->get();


        return view('pages.user.mission-show')->with([
            'mission'=>$mission,
            'applied'=>$applied,
            'applicants'=>$applicants,
            'shareUrl'=>ShareSocial::share(route('mission.show',$mission->title),$mission->title)

        ]);
    }
    /* apply on mission */
 
    


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