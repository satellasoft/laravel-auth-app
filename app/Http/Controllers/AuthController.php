<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Carrega a página de login
     *
     * @return void
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Valida e autentica o usuário
     *
     * @param  Request $request
     * @return void
     */
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:3']
        ]);

        if (!Auth::attempt($credentials))
            return back()->withErrors([
                'Usuário ou senha inválidos.',
            ]);

        return redirect()->route('admin');
    }
    
    /**
     * Faz o logout do usuário
     *
     * @param  Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->withErrors(['Você fez o Logout.']);
    }
}
