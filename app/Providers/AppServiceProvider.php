<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* 全てのviewで使える$is_production
         * 今後使えるかもしれないので残しておく
        $is_production = \App::environment() === 'production' ? true : false;
        \View::share('is_production', $is_production);
        */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
