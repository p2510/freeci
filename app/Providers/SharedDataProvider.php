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
   
        Facades\View::composer(['pages.freelancer.message.*','pages.freelancer.mission.*','pages.freelancer.review.*','pages.freelancer.subscription.*','pages.freelancer.auth.edit','pages.freelancer.dashboard'], function (View $view) {
            $user=User::findOrFail(Auth::id());
            //get notications for this users and shared to global layout 
            $notifications=$user->unreadNotifications; 
            $view->with('notifications', $notifications);
            $notificationMessages=$notifications->where('data.provide','message');
            $view->with('countNotificationMessages', count($notificationMessages));
        }); 
      

    }
}