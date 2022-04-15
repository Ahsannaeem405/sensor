<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\notification;
use Illuminate\Support\Facades\Auth;

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
//dd(Auth::user());
view()->composer(['Admin_asstes.layouts.main'],function($view){

    $notify = notification::where('user_id', auth::user()->id)->where('status',0)->get();
    $view->with('notify',$notify);
});


    }
}
