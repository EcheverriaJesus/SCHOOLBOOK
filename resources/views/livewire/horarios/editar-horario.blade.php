<div>
    <section class="w-full h-auto p-6 mb-10 space-y-1 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <div class="flex items-center space-x-5 text-center">
            <svg width="10%" id="Layer_1" style="enable-background:new 0 0 120 120;" version="1.1" viewBox="0 0 120 120" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <style type="text/css">
                .st0 { fill: #5145CD; }
                .st1 { fill: #F4F4F4; }
                .st2 { fill: #1576CE; }
                .st3 { fill: #FFC856; }
              </style>
              <g>
                <circle class="st0" cx="60" cy="60" r="42.1" />
                <circle class="st1" cx="60" cy="60" r="34.4" />
                <path class="st2" d="M79.8,56.5H63.5V32.9c0-1.9-1.6-3.5-3.5-3.5c-1.9,0-3.5,1.6-3.5,3.5v26.6c0,0.1,0,0.2,0,0.3c0,0.1,0,0.2,0,0.3 c0,1.9,1.6,3.5,3.5,3.5h19.8c1.9,0,3.5-1.6,3.5-3.5C83.3,58.1,81.7,56.5,79.8,56.5z" />
                <circle class="st3" cx="60" cy="60" r="6.7" />
              </g>
            </svg>
            <div class="block space-y-2">
                <p class="text-base font-bold text-indigo-500">Nombre del horario: <span class="text-black">{{$horario->name}}</span></p>
                <div class="flex justify-start space-x-5">
                    <p class="text-base font-bold text-indigo-500">Grado: <span class="text-black">{{$horario->group->grade.'°'}}</span></p>
                    <p class="text-base font-bold text-indigo-500">Grupo: <span class="text-black">{{$horario->group->name}}</span></p>
                    <p class="text-base font-bold text-indigo-500">Turno: <span class="text-black">{{$horario->group->shift}}</span></p>
                  </div>
            </div>
          </div>
    </section> 
       {{-- Agrega los cursos al horario --}}
    @if (!empty($horario))
    <section class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <div class="m-5 bg-white rounded-lg">
            <h1 class="my-2 text-xl text-center text-indigo-500">Agrega los Cursos al Horario</h1>
            <form wire:submit.prevent='agregarHorario'>
                <div class="grid grid-cols-1 gap-4 mx-5 mt-1 sm:grid-cols-2">
                    <div>
                        <x-label for="curso" value="{{ __('Curso') }}" />
                        <select id="curso" wire:model="curso"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                            <option value="">-- Seleccione un curso --</option>
                            @forelse ($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @empty
                            <option value="">-- Seleccione el Grupo y Turno para filtrar los cursos --</option>
                            @endforelse
                        </select>
                        <div class="block mt-2">
                            <x-alert-danger :messages="$errors->get('curso')" />
                        </div>
                    </div>

                    <div>
                        <x-label for="día" value="{{ __('Día') }}" />
                        <select id="día" wire:model="día"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                            <option value="">-- Seleccione el día --</option>
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miércoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                        </select>
                        <div class="block mt-2">
                            <x-alert-danger :messages="$errors->get('día')" />
                        </div>
                    </div>

                    <div>
                        <x-label for="hora_inicio" value="{{ __('Hora de Inicio') }}" />
                        <x-input id="hora_inicio" class="block w-full mt-2 bg-white" type="time"
                            wire:model="hora_inicio" :value="old('hora_inicio')" />
                        <div class="block mt-2">
                            <x-alert-danger :messages="$errors->get('hora_inicio')" />
                        </div>
                    </div>

                    <div>
                        <x-label for="hora_fin" value="{{ __('Hora de Fin') }}" />
                        <x-input id="hora_fin" class="block w-full mt-2 bg-white" type="time" wire:model="hora_fin"
                            :value="old('hora_fin')" />
                        <div class="block mt-2">
                            <x-alert-danger :messages="$errors->get('hora_fin')" />
                        </div>
                    </div>
                    <p class="text-sm text-red-600">*El intervalo de horarios validos se muestra en el horario</p>
                </div>
                <div class="flex justify-end my-4">
                    <button type="submit"
                        class="items-center p-2 px-4 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-700 border border-transparent rounded-md hover:bg-blue-800">
                        Agregar a Horario
                    </button>
                </div>
            </form>
        </div>
    </section>
    @endif
    
    @if (!empty($horario))
    {{-- horario --}}
    <section class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <h1 class="my-1 text-2xl font-bold text-center text-indigo-500">Horario</h1>
        <div class="p-4">
            <div class="container mx-auto">
                <div class="overflow-x-auto">
                    <table class="w-full bg-white border border-blue-200">
                        <thead>
                            <tr>
                                <th class="w-1/6 px-4 py-3 bg-indigo-700 border-b border-blue-200">
                                    <span class="text-white">Horario</span>
                                </th>
                                <th class="w-1/6 px-4 py-3 bg-indigo-700 border-b border-blue-200">
                                    <span class="text-white">Lunes</span>
                                </th>
                                <th class="w-1/6 px-4 py-3 bg-indigo-700 border-b border-blue-200">
                                    <span class="text-white">Martes</span>
                                </th>
                                <th class="w-1/6 px-4 py-3 bg-indigo-700 border-b border-blue-200">
                                    <span class="text-white">Miércoles</span>
                                </th>
                                <th class="w-1/6 px-4 py-3 bg-indigo-700 border-b border-blue-200">
                                    <span class="text-white">Jueves</span>
                                </th>
                                <th class="w-1/6 px-4 py-3 bg-indigo-700 border-b border-blue-200">
                                    <span class="text-white">Viernes</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horarios as $horario)
                            <tr>
                                <td class="w-1/6 px-4 py-4 text-center border border-blue-200">
                                    {{ $horario }}
                                </td>
                                @for ($i = 1; $i <= 5; $i++) <td
                                    class="w-1/6 px-4 py-4 text-center border border-blue-200">
                                    @if (isset($coursesSchedule[$horario][$i]))

                                    <div class="h-auto px-4 py-4 overflow-auto bg-yellow-100">
                                        <p class="block text-sm font-bold">{{ $coursesSchedule[$horario][$i]['name'] }}
                                        </p>
                                        <p class="block text-sm font-bold">Prof. <span class="font-normal">{{
                                                $coursesSchedule[$horario][$i]['teacher'] }}</span></p>
                                        <p class="block text-sm font-bold">Aula: <span class="font-normal">{{
                                                $coursesSchedule[$horario][$i]['classroom'] }}</span></p>
                                        <div class="flex justify-center my-2">
                                            <button wire:click="$emit('eliminarCursoHorario', {{$coursesSchedule[$horario][$i]['course_id']}},{{$coursesSchedule[$horario][$i]['schedule_id']}})"
                                                class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    @endif
                                    </td>
                                    @endfor
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
