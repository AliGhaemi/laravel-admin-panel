<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

<h1>Register</h1>

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

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
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div>
        <label for="user_profile_picture">User Image</label>
        <input id="user_profile_picture" type="file" name="user_profile_picture" required>
        @error('user_profile_picture')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <button type="submit">
            Register
        </button>
    </div>
</form>

</body>
</html>
