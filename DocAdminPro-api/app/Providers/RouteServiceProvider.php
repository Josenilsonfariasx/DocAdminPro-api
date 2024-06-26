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
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
          Route::prefix('api/users')
              ->middleware('api')
              ->namespace($this->namespace)
              ->group(base_path('routes/user/users.routes.php'));
          Route::prefix('api/auth')
              ->middleware('api')
              ->namespace($this->namespace)
              ->group(base_path('routes/auth/api.routes.php'));
          Route::prefix('api/doc')
              ->middleware('api')
              ->namespace($this->namespace)
              ->group(base_path('routes/Document/doc.routes.php'));
          Route::middleware('web')
              ->namespace($this->namespace)
              ->group(base_path('routes/web.php'));
      });
    }
}