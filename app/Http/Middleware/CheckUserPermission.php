<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $params)
    {
        $permissions = explode('-', $params);

        if (!Auth::check())
            return redirect()->route('login')->withErrors(['Você não está autenticado.']);

        $user = Auth::user();

        if (!$user->active)
            return redirect()->route('login')->withErrors(['Usuário não ativo.']);

        if (!in_array($user->permission, $permissions))
            return redirect()->route('login')->withErrors(['Usuário não tem permissão para acessar esse módulo.']);

        return $next($request);
    }
}
