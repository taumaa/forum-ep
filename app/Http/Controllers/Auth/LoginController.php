<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Affiche la page de connexion
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Gère la tentative de connexion
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirection conditionnelle selon le type d'utilisateur
            if (Auth::user()->type === 'student') {
                return redirect('/student');
            } else if (Auth::user()->type === 'admin') {
                return redirect('/admin');
            } else if (Auth::user()->type === 'company') {
                return redirect('/company');
            }
            
            // Redirection par défaut si le type n'est pas reconnu
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }
}
