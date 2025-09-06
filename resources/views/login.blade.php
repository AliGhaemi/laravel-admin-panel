<x-layouts.layout title="Login">
    <div class="w-full min-h-full flex flex-col gap-8 justify-center items-center text-font">
        <h1 class="text-4xl">Login</h1>
        <form method="POST" action="{{ route('login') }}" class="flex flex-col justify-center items-center">
            @csrf
            <div class="flex flex-col gap-3">
                <x-form-field class="w-full" label="Email Address" id="email" type="email"
                              value="{{ old('email') }}" required autofocus/>
            </div>
            <div class="flex flex-col gap-3">
                <x-form-field class="w-full" label="Password" id="password"
                              type="password" required autofocus/>
            </div>
            <x-button type="submit" text="Login" class="w-32"/>
        </form>
    </div>
</x-layouts.layout>
