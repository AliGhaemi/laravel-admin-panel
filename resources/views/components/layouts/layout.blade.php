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
    <body class="font-sans antialiased bg-primary h-screen text-font">
        <x-layouts.header />
        <main class="h-full w-full pt-20">
            {{ $slot }}
        </main>
    </body>
</html>
