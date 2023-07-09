<?php

namespace App\Http\Utils;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProgressionModel {
    
    public static function apply($model) : int|float {
        
        $lastMontProgression=$model::whereMonth('created_at','=', Carbon::today()->month-1)->count();
        $nowMonthProgression=$model::whereMonth('created_at','=', Carbon::today()->month)->count();
        if ( $lastMontProgression!=0 ) {
            $modelProgression=($model::whereMonth('created_at','=', Carbon::today()->month)->count()*100)/$lastMontProgression;
        }else{
            $modelProgression=0;
        }
        
        $response=$lastMontProgression>$nowMonthProgression?-100+round($modelProgression,2):round($modelProgression,2)-100;
        
       return $response ;
       
    }
    
}