<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subscription;

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
    public function freelancerHasSubscriptionPro(User $user)
    {
        $data=Subscription::where('user_id',$user->id)->first();
        if (is_null($data)) return  false;
        return  $data->plan==='pro' &&  $data->estimate>=1;
    }
    
    /* check if user plan is expert */

    public function freelancerHasSubscriptionExpert(User $user)
    {
        $data=Subscription::where('user_id',$user->id)->first();
        if (is_null($data)) return  false;
        return  $data->plan==='expert' &&  $data->estimate>=1;
    }
}