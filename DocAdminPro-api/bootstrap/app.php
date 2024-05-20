<?php

use App\Exceptions\AppError;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        using: function () {
          Route::middleware('api')
              ->prefix('api/users')
              ->group(base_path('routes/user/users.routes.php'));
          Route::middleware('api')
              ->prefix('api/auth')
              ->group(base_path('routes/auth/api.routes.php'));
          Route::middleware('api')
              ->prefix('api/doc')
              ->group(base_path('routes/Document/doc.routes.php'));
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
          if($error instanceof AuthorizationException){
              return response()->json([
                  'errors' => $error->getMessage()
              ], 403);
          }
          if($error instanceof NotFoundHttpException){
              return response()->json([
                  'errors' => 'Route not found'
              ], 404);
          }
        });
    })->create();
