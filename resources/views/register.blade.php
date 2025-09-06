<x-layouts.layout title="Register">
    <div class="w-full min-h-full flex flex-col gap-8 justify-center items-center text-font">
        <h1 class="text-4xl">Register</h1>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
              class="flex flex-col justify-center items-center">
            @csrf

            <div class="flex flex-col gap-3">
                <x-form-field class="w-full" label="User's name" id="name" type="text"
                              value="{{ old('name') }}" required autofocus/>
            </div>
            <div class="flex flex-col gap-3">
                <x-form-field class="w-full" label="Email Address" id="email" type="email"
                              value="{{ old('email') }}" required autofocus/>
            </div>
            <div class="flex flex-col gap-3">
                <x-form-field class="w-full" label="Password" id="password" type="password"
                              value="{{ old('password') }}" required autofocus/>
            </div>
            <div class="flex flex-col gap-3">
                <x-form-field class="w-full" label="Confirm Password" id="password_confirmation"
                              type="password" required autofocus/>
            </div>
            <div class="flex flex-col gap-3">
                <label for="user_profile_picture">User Image</label>
                <input class="bg-utility rounded-lg h-15 w-50 py-4"
                       id="user_profile_picture" type="file" name="user_profile_picture" required>
                @error('user_profile_picture')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-utility text-font hover:cursor-pointer px-10 py-3 rounded-lg mt-5">
                Register
            </button>
        </form>
    </div>
</x-layouts.layout>
