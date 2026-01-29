<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentHour = date('H');
        
        if ($currentHour < 9 || $currentHour >= 15) {
            return response()->json(['message' => 'Access denied. You can only access this resource between 9 AM and 5 PM.'], 403);
        }
        return $next($request);
    }
}
