<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class middlewareRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $userRole = Auth::user()->role->name;
        if ($userRole != $role) {
            return response()->json([
                'message' => "Vous n'avez pas la permission d'entrer.",
            ]);
        }
        return $next($request);
    }
}
