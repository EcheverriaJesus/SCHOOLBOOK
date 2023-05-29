
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" href="../../images/logo.png">
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    <title>Log in</title>
</head>

<body class="h-screen p-20">

    <header class="">
        @if (Route::has('login'))
        <div class="p-6 text-right sm:fixed sm:top-0 sm:right-0">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-blue-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar
                Sesion</a>
            @endauth
        </div>
        @endif
    </header>

    <div class="h-full md:flex">
        <section
            class="relative items-center justify-around hidden w-1/2 overflow-hidden flotar rounded-2xl md:flex bg-gradient-to-tr from-blue-800 to-purple-700 ">
            <div>
                <img class="w-64 h-40 pt-10" src="../images/logo_schoolbook_blanco.png" alt="">
                <p class="flex justify-center mt-1 text-white">Sistema de Control Escolar</p>
            </div>
            <div class="absolute border-4 border-t-8 rounded-full -bottom-32 -left-40 w-80 h-80 border-opacity-30">
            </div>
            <div class="absolute border-4 border-t-8 rounded-full -bottom-40 -left-20 w-80 h-80 border-opacity-30">
            </div>
            <div class="absolute border-4 border-t-8 rounded-full -top-40 -right-0 w-80 h-80 border-opacity-30"></div>
            <div class="absolute border-4 border-t-8 rounded-full -top-20 -right-20 w-80 h-80 border-opacity-30"></div>
        </section>
        {{-- <section class="hidden w-1/2 md:flex flex-col-reverse justify-center items-center one-div flotar h-5/6">
                <div class="absolute border-4 border-t-8 rounded-full -bottom-32 -left-40 w-80 h-80 border-opacity-30">
                </div>
                <div class="absolute border-4 border-t-8 rounded-full -bottom-40 -left-20 w-80 h-80 border-opacity-30">
                </div>
                <div class="absolute border-4 border-t-8 rounded-full -top-40 -right-0 w-80 h-80 border-opacity-30"></div>
                <div class="absolute border-4 border-t-8 rounded-full -top-20 -right-20 w-80 h-80 border-opacity-30"></div>
                <div class="space-y-9">
                    <img class="w-56  pt-10" src="../images/logo_schoolbook_blanco.png" alt="">
                    <p class="flex justify-center items-center relative font-semibold rounded-lg h-12 bg-white mt-1 text-blue-800">Sistema de Control Escolar</p>
                </div>
        </section> --}}

        <section class="flex items-center justify-center py-10 bg-white md:w-1/2">
            @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col pb-7 ">
                    <H1 class="flex justify-center pb-2 text-2xl font-bold text-blue-800">SCHOOL BOOK</H1>
                    <H3 class="text-gray-600">Sistema de Control Escolar Vicente Saldaña #70</H3>
                </div>
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block w-full pl-4 mt-1" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" placeholder="Matricula" />
                    <div class="block mt-2">
                        <x-alert-danger :messages="$errors->get('email')" />
                    </div>
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block w-full pl-4 mt-1 bor" type="password" name="password" required
                        autocomplete="current-password" placeholder="Contraseña" />
                    <div class="block mt-2">
                        <x-alert-danger :messages="$errors->get('password')" />
                    </div>
                </div>
                            <div class="ml-2 py-2">
                                {!! __('Ver los :terms_of_service y :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-button class="ml-4">
                        {{ __('Aceptar') }}
                    </x-button>
                </div>
            </form>
            
        </section>
    </div>

</body>

</html>