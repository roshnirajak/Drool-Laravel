<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\User;
class CheckCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userEmail = $request->cookie('userEmail');

        if ($userEmail) {
            // Check if the email exists in the database
            $user = User::where('email', $userEmail)->first();

            if ($user) {
                return $next($request);
            }
        }
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
