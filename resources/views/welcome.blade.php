<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <title>Login3</title>
</head>

<body class="p-20">

    <header class="">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-blue-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar
                                Sesion</a>{{-- no es necesario logearse si ya esta en una sesion activa --}}
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
           </header>

    <div class="h-auto md:flex">
        <section
            class="rounded-2xl relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
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
            <form class="bg-white">
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Bienvenido a SchoolBok!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Sistema de Control Escolar "Vicente Guerrero Saldaña"</p>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="" id=""
                        placeholder="Matricula" />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="" id=""
                        placeholder="Contraseña" />
                </div>
                <button type="submit"
                    class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Iniciar Sesion</button>
                <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">¿Olvido su contraseña?</span>
            </form>
        </section>
    </div>

</body>

</html>
