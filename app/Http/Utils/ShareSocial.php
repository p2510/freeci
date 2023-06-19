<?php

namespace App\Http\Utils;


use Jorenvh\Share\ShareFacade;

class ShareSocial{

    /** @var string plan
     * return array for shared
     * 
     * */
    public static function share(string $url , string $title):array
    {
      return  ShareFacade::page($url, $title)
                ->facebook()
                ->twitter()
                ->linkedin($title)
                ->whatsapp()->getRawLinks();
    }

  


    
}