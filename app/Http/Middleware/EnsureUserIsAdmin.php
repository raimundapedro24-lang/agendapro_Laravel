<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <--- ADICIONE ESTA LINHA
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
        // Agora o Auth::check() vai funcionar porque a classe foi importada acima
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Acesso negado. Área exclusiva do administrador.');
    }
}





