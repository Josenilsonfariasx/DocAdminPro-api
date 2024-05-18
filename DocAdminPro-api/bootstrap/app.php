<?php

use App\Exceptions\AppError;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        using: function () {
          Route::middleware('api')
              ->prefix('api/users')
              ->group(base_path('routes/user/users.routes.php'));
          Route::middleware('web')
              ->group(base_path('routes/web.php'));
      },
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {  
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $error, Request $request) {
          if($error instanceof ValidationException){
            return response()->json([
                'errors' => $error->validator->errors()
            ], 422);
          }
            if($error instanceof AppError){
                return response()->json([
                    'errors' => $error->getMessage()
                ], $error->getCode());
            }
        });
    })->create();
