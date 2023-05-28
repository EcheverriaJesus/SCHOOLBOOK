<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                
               <x-button_back>
                <x-slot name="route"> {{route('schedule.index')}} </x-slot>
                 {{ __('schedule.index') }}
               </x-button_back>

                <div class="p-6 text-gray-900">
                    <h1 class="my-6 text-xl font-extrabold text-center">
                        Registro de Horario
                    </h1>
                    @if (session()->has('mensaje'))
                    <div
                        class="p-2 my-3 text-sm font-extrabold text-green-600 uppercase bg-green-100 border border-green-600">
                        {{session('mensaje')}}
                    </div>
                    @endif
                    <div class="p-5 md:justify-center md:flex">
                        <livewire:horarios.crear-horario />   
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>