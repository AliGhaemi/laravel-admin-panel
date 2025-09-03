<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rules;
use function Laravel\Prompts\error;

class RegisteredUserController extends Controller
{
//    public function create(): Response
//    {
//        return Inertia::render('Register');
//    }
    public function create()
    {
        return view('register');
    }

    public function store(RegisterRequest $request) {

        $imagePath = $request->file('user_profile_picture')->store('user_profile_pictures', 'public');

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture_path' => $imagePath,
        ]);

        event(new Registered($user));

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(route('' , absolute: false));
    }
}
