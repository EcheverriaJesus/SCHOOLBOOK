<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <x-button_back>
                    <x-slot name="route"> {{route('teachers.index')}} </x-slot>
                     {{ __('teachers.index') }}
                   </x-button_back>
                <div class="p-6 text-gray-900">
                    <h1 class="my-6 text-xl font-extrabold text-center">
                        Editar datos del Profesor
                    </h1>
                    <div class="p-5 md:justify-center md:flex">
                       <livewire:editar-profesor :teacher="$teacher"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
