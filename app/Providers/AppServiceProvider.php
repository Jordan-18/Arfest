<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        view()->composer(['*'], function ($view) {
            if(Auth::check()){
                $userprofile = User::find(Auth::user()->id);
            }else{
                $userprofile = null;
            }
            $eventspending = Event::where('status','=','PENDING')->count();
            $view->with(compact('userprofile','eventspending'));
        });
    }
}
