<form class="space-y-5 md:w-1/2" wire:submit.prevent='editarCurso'>

    <section class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Curso</h2>

        <div>
            <x-label for="materia" value="{{ __('Materia') }}" />
            <select id="materia" wire:model="materia"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione la materia --</option>
                @forelse ($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
                @empty
                <option value="">No hay materias registradas</option>
                @endforelse
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('materia')" />
            </div>
        </div>

        <div>
            <x-label for="grupo" value="{{ __('Grupo') }}" />
            <select id="grupo" wire:model="grupo"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el grupo --</option>
                @forelse ($groups as $group)
                <option value="{{$group->id}}">{{$group->grade.'° '.$group->name}}</option>
                @empty
                <option value="">No hay grupos registrados</option>
                @endforelse
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('grupo')" />
            </div>
        </div>

        <div>
            <x-label for="ciclo" value="{{ __('Ciclo Escolar') }}" />
            <select id="ciclo" wire:model="ciclo"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el ciclo escolar --</option>
                @forelse ($cycles as $cycle)
                <option value="{{$cycle->id}}">{{$cycle->cycle_name}}</option>
                @empty
                <option value="">No hay Ciclos Escolares Activos</option>
                @endforelse
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('ciclo')" />
            </div>
        </div>
        
        <div class="w-full">
            <label for="estatus" class="block mb-1 text-sm">Estatus</label>
            <label class="relative inline-flex items-center cursor-pointer">
                <input wire:model="estatus" id="estatus" type="checkbox" value="1" class="sr-only peer">
                <div
                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Activo</span>
            </label>
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('estatus')" />
            </div>
        </div>
        
        <div class="flex justify-end">
            <x-button class="ml-4">
                {{ __('Guardar') }}
            </x-button>
        </div>
    </section>

    
</form>

