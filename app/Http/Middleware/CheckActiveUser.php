<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckActiveUser
{
    public function handle(Request $request, Closure $next): Response{
        // 1. Verifica se o usuário está logado e se NÃO está ativo
        if (Auth::check() && !Auth::user()->active) {
            // 2. Faz o logout do usuário
            Auth::logout();

            // 3. Invalida a sessão atual
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // 4. Redireciona para o login com uma mensagem de erro
            return redirect()->route('login')->with('error', 'Sua conta ainda não foi ativada pelo administrador.');
        }

        return $next($request);
    }
}
