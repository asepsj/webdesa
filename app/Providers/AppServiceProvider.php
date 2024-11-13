<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Gate::define('admin', function(User $user){
        //     return $user->type==1;
        // });

        // Gate::define('manager', function(User $user){
        //     return $user->type == 2;
        // });

        // Gate::define('user', function(User $user){
        //     return $user->type == 0;
        // });
    }
}
