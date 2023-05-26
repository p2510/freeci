<?php

namespace App\Http\Controllers;


use App\Http\Utils\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SubscriptionCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SubscriptionController extends Controller
{


    /**
     * online gateway 
     */
    public function create(string $plan=null)
    {
        return view('pages.freelancer.subscription.create')->with(['plan'=>$plan]);
    }

    public function success()
    {
        return view('pages.freelancer.subscription.success');
    }

    public function ipn(Request $request)
    {
        
        $type_event = Input::get('type_event');
        $custom_field = json_decode(Input::get('custom_field'), true);
        $ref_command = Input::get('ref_command');
        $item_name = Input::get('item_name');
        $item_price = Input::get('item_price');
        $devise = Input::get('devise');
        $command_name = Input::get('command_name');
        $env = Input::get('env');
        $token = Input::get('token');
        $api_key_sha256 = Input::get('api_key_sha256');
        $api_secret_sha256 = Input::get('api_secret_sha256');

        $my_api_key = env('API_KEY');
        $my_api_secret = env('API_SECRET');

        if(hash('sha256', env('PAYTECH_SECRET_KEY')) === $api_secret_sha256 && hash('sha256', env('PAYTECH_API_KEY')) === $api_key_sha256)
        {
            //from PayTech
        }
        else{
            //not from PayTech
        }
        
    }

    /**
     * cash gateway 
     */
    public function cash_code()
    {
        return view('pages.freelancer.subscription.cash');
    }
    public function cash_code_validation(Request $request)
    {
        $validate=$request->validate([
            'code'=>['required','string']
        ]);
        $data=SubscriptionCode::where('email',Auth::user()->email)->where('code',$request->code)->where('is_validated',true)->get();
   
       
       if (count($data)==1) {
          // check if user has subscription
          $subscription=Subscription::where('user_id',Auth::user()->id)->get();
          if (count($subscription)==0) {
            
                Subscription::create([
                    'plan'=>$data[0]->plan,
                    'estimate'=>Plan::getEstimate($data[0]->plan),
                    'user_id'=>Auth::user()->id,
                ]);
          
          }else{
                $estimate= Plan::getEstimate($data[0]->plan)+ $subscription[0]->estimate;
                Subscription::where('user_id',Auth::user()->id)->update([
                    'plan'=>$data[0]->plan,
                    'estimate'=>$estimate
                ]);
           
          }
            
            
          // update code status 
            
         DB::table('subscription_codes')->where('code',$request->code)->update([
            'is_validated'=>false
         ]);
         session()->flash('code_status','valide');
       }else{
          session()->flash('code_status','invalide');
       }
       
       return view('pages.freelancer.subscription.cash');
       
    }




    /**
     * invoice 
     */


    public function invoice(int $id=null)
    {
        if (is_null($id)) {
            $data=SubscriptionCode::where('email',Auth::user()->email)->where('is_validated',false)->orderBy('created_at','Desc')->take(1)->get();
            $pricing=Plan::getPricingToString($data['0']->plan);
        }else{
            $data=SubscriptionCode::where('id',$id)->where('is_validated',false)->orderBy('created_at','Desc')->take(1)->get();
            $pricing=Plan::getPricingToString($data['0']->plan);
        }

        return view('pages.freelancer.subscription.invoice')->with(['data'=>$data,'pricing'=> $pricing]);
    }

   
    
}