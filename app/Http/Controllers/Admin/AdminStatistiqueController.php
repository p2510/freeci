<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mission;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\MissionApplicant;
use App\Http\Controllers\Controller;
use App\Http\Utils\ProgressionModel;

class AdminStatistiqueController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
 
        $subscriptionPlan=[
                            Subscription::where('plan','basic')->whereYear('created_at','=',Carbon::today()->year)->count(),
                             Subscription::where('plan','pro')->whereYear('created_at','=',Carbon::today()->year)->count(),
                             Subscription::where('plan','expert')->whereYear('created_at','=',Carbon::today()->year)->count(),
                           ];
        return view('pages.admin.information.statistique')->with([
            'freelancer'=>User::count(),
            'progressionFreelancer'=>ProgressionModel::apply(User::class),
            'mission'=>Mission::count(),
            'progressionMission'=>ProgressionModel::apply(Mission::class),
            'applicant'=>MissionApplicant::count(),
            'progressionApplicant'=>ProgressionModel::apply(MissionApplicant::class),
            'subscriptionPlan'=>$subscriptionPlan
        ]);
    }
}