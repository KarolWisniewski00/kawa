<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Sprawdź, czy zalogowany użytkownik ma rolę "admin"
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        // Jeśli nie ma roli "admin", możesz przekierować go gdzieś lub zwrócić odpowiedź 403 Forbidden
        return abort(403, 'Brak dostępu');
    }
}
