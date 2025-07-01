<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $judul = 'Login';
        return view('dashboard.auth.login', compact('judul'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        // Cek tipe user
        if (auth()->user()->tipe === 'admin') {
            return redirect()->route('dashboard');
        } elseif (auth()->user()->tipe === 'user') {
            return redirect()->route('menu');
        } else {
            // Jika tipe tidak dikenali, logout
            auth()->logout();
            return redirect()->route('login')->withErrors(['email' => 'Tipe user tidak dikenali.']);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
