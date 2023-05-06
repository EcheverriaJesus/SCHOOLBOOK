<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-start m-5">
                    <a href="{{route('contributions.index')}}" class="p-1 bg-indigo-600 rounded-full">
                        <svg width="24" height="24" fill="none" stroke="#ffffff" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"></path>
                        </svg>
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <h1 class="my-6 text-xl font-extrabold text-center">
                        Registro de Aportaciones
                    </h1>
                    @if (session()->has('mensaje'))
                    <div
                        class="p-2 my-3 text-sm font-extrabold text-green-600 uppercase bg-green-100 border border-green-600">
                        {{session('mensaje')}}
                    </div>
                    @endif
                    <div class="p-5 md:justify-center md:flex">
                        <livewire:aportaciones.crear-aporte />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
