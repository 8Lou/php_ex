<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    //protected $namespace = 'App\Http\Controllers';  //добавила эту 1ю строку и 2 другие для адааптации 8 версии к старым
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                        //->namespace($this->namespace)  // добавила эту 2ю строку и 2 другие для адааптации 8 версии к старым
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')

            //->namespace($this->namespace)  // // добавила эту 3ю строку и 2 другие для адааптации 8 версии к старым
                ->group(base_path('routes/api.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
