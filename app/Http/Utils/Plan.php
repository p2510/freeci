<?php

namespace App\Http\Utils;

class Plan {

    /** @var string plan
     * return number for this plan 
     * 
     * */
    public static function getEstimate(string $plan):int
    {
        if ($plan=='basic') {
            return 3;
        }elseif ($plan=='pro') {
            return 8;
        }else{
            return 15 ; 
        }
    }

    /** @var pricing plan
     * return number for this plan 
     * 
     * */
    public static function getPricingToString(string $plan):string
    {
        if ($plan=='basic') {
            return '1.000';
        }elseif ($plan=='pro') {
            return '5.000';
        }else{
            return '8.000' ; 
        }
    }
        /** @var pricing plan
     * return number for this plan 
     * 
     * */
    public static function getPricingToInt(string $plan):int
    {
        if ($plan=='basic') {
            return 1000;
        }elseif ($plan=='pro') {
            return 5000;
        }else{
            return 8000 ; 
        }
    }
}