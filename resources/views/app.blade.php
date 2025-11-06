<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title inertia>{{ config("app.name", "Laravel") }}</title>

        <!-- Favicon -->
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('favicon/favicon-96x96.png') }}"
            sizes="96x96"
        />
        <link
            rel="icon"
            type="image/svg+xml"
            href="{{ asset('favicon/favicon.svg') }}"
        />
        <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="{{ asset('favicon/apple-touch-icon.png') }}"
        />
        <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />

        <!-- Font Awesome -->
        <script
            src="https://kit.fontawesome.com/80916011c5.js"
            crossorigin="anonymous"
        ></script>

        <!-- Scripts -->
        @routes @vite(['resources/js/app.js', "resources/sass/app.scss",
        "resources/js/Pages/{$page['component']}.vue"]) @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
