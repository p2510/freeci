<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlanPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    /* check if user plan is pro */
    public function freelancerHasSubscriptionPro()
    {
        $user=Subscription::where('user_id',Auth::id())->first();
        
        return  $user->plan==='pro' &&  $user->estimate>=1;
    }
    
    /* check if user plan is expert */

    public function freelancerHasSubscriptionExpert()
    {
        $user=Subscription::where('user_id',Auth::id())->first();
        return  $user->plan==='expert' &&  $user->estimate>=1;
    }
}