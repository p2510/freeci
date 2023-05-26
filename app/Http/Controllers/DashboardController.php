<?php

namespace App\Http\Controllers;

use App\Models\View;
use App\Models\Recommended;
use Illuminate\Support\Arr;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SubscriptionCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         // get informations subscriptions
        $subscriptionInfo=Subscription::where('user_id',Auth::user()->id)->get();
         // get count recommended
        $recommended=Recommended::where('user_id',Auth::user()->id)->count();
         // get count views
        $views= View::where('user_id',Auth::user()->id)->whereYear('created_at',date('Y'))->get('created_at')->toArray();
        $views=array_count_values(Arr::flatten($views));
        $dataViews=['1'=>0,'2'=>2,'3'=>0,'4'=>0,'5'=>0,'6'=>0,'7'=>0,'8'=>0,'9'=>0,'10'=>0,'11'=>0,'12'=>0];

        foreach ($views as $key => $item) {
            $dataViews[$key]=$item;
        }
         // get invoices
         $invoices=SubscriptionCode::where('email',Auth::user()->email)->orderBy('created_at','Desc')->get();
    

        return view('pages.freelancer.dashboard')->with([
            'subscriptionInfo'=>$subscriptionInfo,
            'recommended'=> $recommended,
            'views'=>implode(',',$dataViews),
            'invoices'=>$invoices
            
        ]);
    }
}