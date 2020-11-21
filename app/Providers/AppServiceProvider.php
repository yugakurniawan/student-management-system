<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        Gate::define('admin-student', function($user){
            if ($user->role == 'admin' || $user->role == 'student'){
                return true;
            }
        });

        Gate::define('admin', function($user){
            // ini admin
            return $user->role == 'admin';
        });

        Gate::define('student', function($user){
            return $user->role == 'student';
        });
    }

}
