@extends('app-inertia')

@section('content')
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">
                Login
            </button>
        </div>
    </form>
@endsection
