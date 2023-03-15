<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SchoolBook</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="w-full h-auto font-sans antialiased">
    <x-banner />
    <!-- Page Heading -->
    <div class="min-h-screen">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main class="p-4 mt-16">
            <div class=" sm:ml-64">
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="px-4 py-6 max-w-7xl sm:ml-10 lg:px-1">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                {{ $slot }}
            </div>
        </main>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    @stack('modals')
    @livewireScripts
</body>

</html>
