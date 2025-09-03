<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Posts</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

        @vite(['resources/css/app.css'])
    </head>
    <body class="font-sans antialiased">
        <header class="h-20 w-full sticky top-0 bg-secondary flex items-center justify-end">
            <div class="mx-4 flex gap-3">
                @guest
                    <button class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg">
                        <a href="/login">Login</a>
                    </button>
                    <button class="bg-utility text-font hover:cursor-pointer px-8 py-3 rounded-lg">
                        <a href="/register">Register</a>
                    </button>
                @endguest
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>
