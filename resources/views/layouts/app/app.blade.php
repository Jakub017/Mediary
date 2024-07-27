<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Healthcare AI</title>
        @vite('resources/css/app.css')
        <script
            src="https://kit.fontawesome.com/80916011c5.js"
            crossorigin="anonymous"
        ></script>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet"
        />
        <!-- Critical JS, avoiding white flash on refresh -->
        <script>
            function checkTheme() {
                const userTheme = localStorage.getItem("theme");
                if (userTheme === "dark") {
                    document.documentElement.classList.add("dark");
                }
            }
            checkTheme();
        </script>
    </head>
    <body class="max-h-screen min-h-screen min-w-screen flex">
        <div class="flex flex-grow">
            @include('partials.app.sidebar')
            <div class="flex flex-col w-full h-full dark:bg-[#212121]">
                @include('partials.app.nav')
                <div class="p-6 w-full h-auto overflow-y-scroll no-scrollbar">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Development -->
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>
