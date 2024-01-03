<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerifiedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header("token");
        $result = JWTToken::JWTVerify($token);

        if ($result == 'Unautthorized') {
            return response()->json([
                "status"=> "Faild",
                "message"=> "Something went wrong",
            ], 401);
        }else{
            $request->headers->set("email", $result);
            return $next($request);
        }
    
    }
}
