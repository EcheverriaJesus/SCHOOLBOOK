<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <x-button_back>
                    <x-slot name="route"> {{route('schedule.index')}} </x-slot>
                    {{ __('students.index') }}
                </x-button_back>
                <h1 class="my-6 text-xl font-extrabold text-center text-indigo-600">
                    Editar Horario
                </h1>
                <livewire:horarios.editar-horario :schedule="$schedule"/>
            </div>
        </div>
    </div>
</x-app-layout>