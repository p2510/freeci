<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class SharedDataProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
   
        Facades\View::composer('pages.freelancer.*', function (View $view) {
            $user=User::findOrFail(Auth::id());
            //get notications for this users and shared to global layout 
            $notifications=$user->unreadNotifications; 
            $view->with('notifications', $notifications);
        }); 
      

    }
}