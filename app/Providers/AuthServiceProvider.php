<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //fonction pour permettre ou non d'editer un user 
        Gate::define('edit-users', function($user) {

            return $user->isAdmin();

        });

        //fonction pour permettre ou non de supprimer un user
        Gate::define('delete-users', function($user) {

            return $user->isAdmin();

        });
    }
}
