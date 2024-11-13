<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('isAdmin', function($user) {
           return $user->type == 'admin';
        });
        Gate::define('isEditor', function($user) {
            return $user->type == 'super admin';
        });
        Gate::define('isAuthor', function($user) {
            return $user->type == 'user';
        });
        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
    }
}