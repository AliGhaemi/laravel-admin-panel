@extends('app')

@section('content')
    <div class="w-full min-h-full flex flex-col gap-8 justify-center items-center text-font">
        <h1 class="text-4xl">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="flex flex-col justify-center items-center">
            @csrf
            <div class="flex flex-col gap-3">
                <label for="email">Email Address</label>
                <input class="bg-utility rounded-lg h-10"
                       id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label for="password">Password</label>
                <input class="bg-utility rounded-lg h-10"
                       id="password" type="password" name="password" required>
                @error('password')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-utility text-font hover:cursor-pointer px-10 py-3 rounded-lg mt-5">
                Login
            </button>
        </form>
    </div>
@endsection
