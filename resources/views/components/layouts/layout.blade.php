<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'Application Title' }}</title>

        <link rel="icon" href="{{ Vite::index('favicon.ico') }}" sizes="any">
        <link rel="icon" href="{{ Vite::index('favicon.svg') }}" type="image/svg+xml">
        <link rel="apple-touch-icon" href="{{ Vite::index('apple-touch-icon.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

        @vite(['resources/css/app.css'])
    </head>
    <body class="font-sans antialiased bg-primary h-screen">
        <header class="h-20 w-full fixed top-0 bg-secondary flex items-center justify-end">
            <div class="mx-4 flex gap-3">
                @guest
                    <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
                       href="{{ route('login') }}">Login</a>
                    <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
                       href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                    @can('is-admin')
                        <a class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg"
                           href="{{ route('admin.handle') }}">Admin Panel</a>
                    @endcan
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </header>
        <main class="h-full w-full mt-20">
            {{ $slot }}
        </main>
    </body>
</html>
