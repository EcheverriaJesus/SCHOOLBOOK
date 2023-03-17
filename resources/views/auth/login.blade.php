{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
 --}}


 
 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    <title>Log in</title>
</head>

<body class="p-20 h-screen">

    {{-- <header class="">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-blue-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar
                                Sesion</a>
    @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar
                                Sesion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrar</a>
                            @endif
                        @endauth
                    </div>
                @endif
           </header> --}}

    <div class="h-full md:flex">
        <section class="flotar rounded-2xl relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
            <div>
                <img class="w-64º h-40 pt-10" src="../images/logo_schoolbook_blanco.png" alt="">
                {{-- <h1 class="text-white font-bold text-4xl font-sans">SchoolBook</h1> --}}
                <p class="flex justify-center text-white mt-1">Sistema de Control Escolar</p>
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
            </div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8">
            </div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </section>

        <section class="flex md:w-1/2 justify-center py-10 items-center bg-white">
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
    <div class="flex flex-col pb-7 ">
        <H1 class="flex justify-center font-bold text-blue-800 text-2xl pb-2">SCHOOL BOOK</H1>
        <H3>Sistema de Control Escolar Vicente Saldaña</H3>
    </div>
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="pl-4 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Matricula"/>
                </div>
    
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="bor pl-4 block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Contraseña"/>
                </div>
    
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <x-button class="ml-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
                {{-- <x-validation-errors class="mb-4" />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="text-gray-800 font-bold text-2xl mb-1">Bienvenido a SchoolBok!</h1>
                    <p class="text-sm font-normal text-gray-600 mb-7">Sistema de Control Escolar "Vicente Guerrero Saldaña"</p>
    
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
        
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <x-button class="ml-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
          --}}
        </section>
    </div>

</body>

</html>
