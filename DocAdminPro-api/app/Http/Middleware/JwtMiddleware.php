<?php
namespace App\Http\Middleware;
use App\Exceptions\AppError;
use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware {
  public function handle(Request $request, Closure $next){
    Try{
      JWTAuth::parseToken()->authenticate();
      return $next($request);
    }catch(JWTException $error){

      if($error instanceof TokenInvalidException){
        throw new AppError('Token invalid', 498);
      }
      if($error instanceof TokenExpiredException){
        throw new AppError('Token Expired', 401);
      }
      throw new AppError($error->getMessage(), 500);
    }
  }
}