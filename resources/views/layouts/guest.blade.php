<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Você pode usar um link direto, garantindo que 'public/css/app.css' exista --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{-- O JavaScript ainda pode ser processado pelo Vite, se desejar --}}
        @vite(['resources/js/app.js'])
    </head>
    <body class="guest-body"> {{-- Nova classe para estilização do body --}}
        <div class="guest-container"> {{-- Nova classe para o container principal --}}
            {{-- Removi o div do logo que você tinha no seu login.blade.php, mas se ele existia aqui, você pode recriá-lo com suas próprias classes --}}
            <div class="guest-card"> {{-- Nova classe para o card de conteúdo --}}
                {{ $slot }}
            </div>
        </div>
    </body>
</html>