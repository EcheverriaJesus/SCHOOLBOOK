<div>
    <x-button_back>
        <x-slot name="route"> {{route('schedule.index')}} </x-slot>
        {{ __('schedule.index') }}
    </x-button_back>
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
    <section class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
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
</div>