<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
//    public function create(Request $request): Response
//    {
//        return Inertia::render('Login', [
//            'canResetPassword' => Route::has('password.request'),
//            'status' => $request->session()->get('status'),
//        ]);
//    }
    public function create()
    {
        return view('login');
    }

//    public function store(LoginRequest $request): RedirectResponse
//    {
//        $request->authenticate();
//        $request->session()->regenerate();
//        return redirect()->intended(route('profile.show', absolute: false));
//    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($attributes)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
