<?php

namespace App\Providers;
use App\Post ; 
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies; 



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       //'App\Model' => 'App\Policies\ModelPolicy',
        Post::class=>Policies\ArticlesPolicy::class ,
         User::class=>Policies\UserPolicy::class 
    ];
     

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        //
    }
}
