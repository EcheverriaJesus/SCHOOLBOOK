@if (!empty($scheduleData))
<div class="flex justify-center">
    <h1 class="my-4 text-xl font-bold text-indigo-600">Horario</h1>
</div>
<div class="grid grid-cols-1 gap-4 md:grid-cols-5">
    @foreach ($scheduleData as $day => $courses)
    <div class="p-4 bg-white rounded-md shadow-md">
        <div class="flex items-center justify-center p-2 bg-indigo-600">
            <p class="mb-2 text-lg font-bold text-center text-white">
                    {{$day}}
            </p>
        </div>
        @php
        $sortedCourses = collect($courses)->sortBy('start_time');
        @endphp
        @foreach ($sortedCourses as $course)
        <div class="p-2 my-4 bg-yellow-100 shadow-md">
            <div class="flex items-center my-1 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#5145CD" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7 14h-8v-9h2v7h6v2z" />
                </svg>
                <p class="text-sm gray-500 text-">{{ date('H:i', strtotime($course['start_time'])) }} - {{ date('H:i',
                    strtotime($course['end_time'])) }}</p>
            </div>
            <p class="text-base font-bold">{{ $course['name'] }}</p>
            @if (!empty($course['group']))
            <p class="text-sm font-extrabold text-gray-800">Grado y grupo: <span class="font-normal">{{ $course['group']
                    }}</span></p>
            @endif
            @if (!empty($course['teacher']))
            <p class="text-sm font-extrabold text-gray-800">Prof.<span class="font-normal">{{ $course['teacher']
                    }}</span></p>
            @endif
            <p class="text-sm font-bold text-gray-800">Aula: <span class="font-normal">{{ $course['classroom'] }}</span>
            </p>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@else
<p class="p-3 text-sm text-center text-gray-600">No hay un horario registrado</p>
@endif