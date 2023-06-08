<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;
use App\Models\MissionApplicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApplicantMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas=DB::table('mission_applicants')
        ->where('mission_applicants.user_id',Auth::user()->id)
        ->join('missions','missions.id','=','mission_applicants.mission_id') 
        ->select('mission_applicants.budget','mission_applicants.id','mission_applicants.accepted','mission_applicants.mission_id','missions.title','missions.phone')
        ->get();
 
        return view('pages.freelancer.mission.index')->with([
        'datas'=>$datas
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
    public function store(Mission $mission,Request $request)
    {
       $data=$request->validate([
           'budget'=>['required','integer','min:'.$mission->budget_min,'max:'.$mission->budget_max],
       ]);
       $data['user_id']=Auth::user()->id;
       $data['mission_id']=$mission->id;
       $data['accepted']=false;
       MissionApplicant::create($data);
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        $mission_budgets=Mission::find($request->input('mission_id'));
        $data=$request->validate([
            'budget'=>['required','integer','min:'.$mission_budgets->budget_min,'max:'.$mission_budgets->budget_max],
            'id'=>['required','integer']
        ]);
        
        MissionApplicant::where('id',$data['id'])->update([
            "budget"=>$data['budget'],
        ]);

       $request->session()->flash('update-budget', 'update-budget');
       return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request , string $id)
    {
    
        MissionApplicant::destroy($id);
        $request->session()->flash('delete-applicant', 'delete-applicant');
        return redirect()->back();

        
    }
}