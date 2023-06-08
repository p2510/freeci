<?php

namespace App\Providers;

use App\Policies\PlanPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is-pro', [PlanPolicy::class, 'freelancerHasSubscriptionPro']);
        Gate::define('is-expert', [PlanPolicy::class, 'freelancerHasSubscriptionExpert']);
     
    }
}