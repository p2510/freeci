<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Http\Utils\PayTech;
use Illuminate\Support\Facades\Auth;


class ChoosePlan extends Component
{
    
    public $plan;
    public $price;
    public $plan_selected;
    public $payment_type;
    public $terms;
    
    public function mount(string|null $plan)
    {
        
        $this->plan=$plan;
        $this->plan_selected=$plan;
        $this->payment_type='money';
        $this->terms=true;

        if ($plan=='basic'|| is_null($plan)) {
            $this->price=1000 ;
            $this->plan='basic';
            $this->plan_selected='basic';
        } elseif($plan=='pro') {
            $this->price=5000 ;
        }else{
            $this->price=8000 ;
        }
    }
    public function choosePlan(string|null $newPlan)
    {
       $this->plan=$newPlan;
       $this->plan_selected=$newPlan;
        if ($newPlan=='basic'|| is_null($newPlan)) {
            $this->price=1000 ;
            
        } elseif($newPlan=='pro') {
            $this->price=5000 ;
        
        }else{
            $this->price=8000 ;
        }
       
    }

    
    protected $rules=[
        'plan_selected'=>'required|string',
        'payment_type'=>'required|string',
        'terms'=>'required|boolean|accepted',
    ];

    public function checkout()
    {

       $this->validate();
       if ($this->payment_type==='money') {
       
      
          $item =array(
        "name"    =>'Plan '.$this->plan,
        "price"   => $this->price,
        "currency"     => "xof",
        "command_name" =>  'Acheter un nouveau plan chez Freeci entoutes sécurité',
        "env"          =>  'test',
        "success_url"  => '',
        "ipn_url"		   => '',
        "cancel_url"   =>  '',
        "custom_field" =>   ''
        );//object//object
        
        $BASE_URL  = 'https://yatachi-code.org';
        $id=uniqid();
        $jsonResponse = (new PayTech(env('PAYTECH_API_KEY'),env('PAYTECH_SECRET_KEY')))->setQuery([
                'item_name' => $item['name'],
                'item_price' => $item['price'],
                'command_name' => $item['name'],

            ])->setCustomeField([
                'item_id' => $id,
                'time_command' => time(),
                'ip_user' => $_SERVER['REMOTE_ADDR'],
                'lang' => 'reset',
                'user_id'=>Auth::user()->id,
                
                
            ])
                ->setTestMode(true)
                ->setCurrency($item['currency'])
                ->setRefCommand(uniqid())
                ->setNotificationUrl([
                    'ipn_url' =>     $BASE_URL.'/ipn.php', //only https
                    'success_url' => $BASE_URL.'/ipn.php',//route('ipn.success'),
                    'cancel_url' =>  route('subscription.create')//route('subscription.create'),
                ])->send();
            
            redirect($jsonResponse['redirect_url']);
        

        }
        
    }
 
    public function render()
    {
        return view('livewire.choose-plan');
    }
}