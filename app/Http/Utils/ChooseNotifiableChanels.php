<?php

namespace App\Http\Utils;

use App\Models\Subscription;

class ChooseNotifiableChanels {


    /** @var $id
     * return notifiable canal for this plan 
     * 
     * */

    static function channel(int $id) : array {
        
        $user=Subscription::where('user_id',$id)->first();
        $response=[];
        if (is_null($user)) {
            $response=['database'];
        } else {
            if ($user->estimate==0) {
              $response=['database'];
            }elseif($user->plan==='pro'){
              $response=['database','mail'];
            }elseif($user->plan==='expert'){
               $response=['database','mail'];
            }
        }

        return $response;
        
    }

}