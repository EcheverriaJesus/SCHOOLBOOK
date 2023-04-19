<form class="space-y-5 md:w-full" wire:submit.prevent='crearGrupo'>
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del grupo</h2>
    <section
        class="grid w-full h-auto p-6 mb-10 bg-white border shadow-2xl md:gap-4 md:grid-cols-2 sm:bg-white rounded-xl">
        <div>
            <x-label for="nombre" value="{{ __('Nombre del Grupo') }}" />
            <x-input id="nombre" class="block w-full mt-1" type="text" wire:model="nombre" placeholder="Ej. A"
                :value="old('nombre')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('nombre')" />
            </div>
        </div>

        <div class="w-full">
            <x-label for="turno" value="{{ __('Turno') }}" />
            <select id="turno" wire:model="turno"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el turno --</option>
                <option value="matutino">Matutino</option>
                <option value="vespertino">Vespertino</option>
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('turno')" />
            </div>
        </div>

        <div class="w-full">
            <x-label for="grado" value="{{ __('Grado') }}" />
            <select id="grado" wire:model="grado"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el grado --</option>
                <option value="1">1°</option>
                <option value="2">2°</option>
                <option value="3">3°</option>
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('materia')" />
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
        </div>
    </section>

    <section>
        <div class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
            <h2 class="flex justify-center text-xl font-bold text-indigo-600">Asignación del aula</h2>
            <h3 class="flex justify-start text-xl font-bold text-indigo-600">Lista de aulas asignadas</h3>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="w-1/2 px-6 py-3 text-center">
                                Nombre del aula
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Grupo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="w-1/2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$group->classroom->classroom_name}}
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{
                                    $group->grade."°".$group->name." Turno:".$group->shift
                                }}
                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($classrooms->count() == 0)
            <p class="p-3 text-sm text-center text-gray-600"> No hay aulas registradas</p>
            @endif
        </div>

        <div class="md:w-1/2">
            <x-label for="aula" value="{{ __('Asignar una aula') }}" />
            <select id="aula" wire:model="aula"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el aula --</option>
                @foreach ($aulasSinGrupo as $aula)
                <option value="{{$aula->id}}">{{$aula->classroom_name}}</option>
                @endforeach
            </select>
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('aula')" />
            </div>
        </div>

        
        
    </section>

    <div class="flex justify-end">
        <x-button class="ml-4">
            {{ __('Guardar') }}
        </x-button>
    </div>

</form>
