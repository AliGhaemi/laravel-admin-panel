<?php

namespace App\Http\Controllers;

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

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imagePath = $request->file('user_profile_picture')->store('user_profile_pictures', 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_profile_picture' => $imagePath,
        ]);

        Auth::login($user);

        return redirect()->route('profile');
    }

//    public function store(Request $request): RedirectResponse
//    {
//        $request->validate([
//            'name' => 'required|string|max:225',
//            'email' => 'required|string|lowercase|email|max:225|unique:' . User::class,
//            'password' => ['required', 'confirmed', Rules\Password::defaults()],
//        ]);
//
//        $user = User::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password)
//        ]);
//        event(new Registered($user));
//        Auth::login($user);
//        return redirect()->intended(route('profile.show', absolute: false));
//    }
}
