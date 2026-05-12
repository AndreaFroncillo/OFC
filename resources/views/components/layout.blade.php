<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Olimpia Club House' }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ time() }}">
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @props(['hideSubscription' => false, 'fullHeight' => false])

    <x-navbar />

    <div class="{{ $fullHeight ? 'min-vh-100' : '' }}">
        <main>
            {{ $slot }}
        </main>
    </div>

    @if(!$hideSubscription)
    <section class="section section-gradient">
        <div class="container">      
            <div class="row d-flex align-items-stretch justify-content-center">
                @auth
                <x-submission-form />
                @endauth
                <x-journey-form />
            </div>
        </div>
    </section>
    @endif

    <x-footer />
</body>

</html>