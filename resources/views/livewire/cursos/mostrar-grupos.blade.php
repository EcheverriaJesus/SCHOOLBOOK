<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3">
        @forelse ($courses as $course)
        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="48px">
                    <rect fill="#0077FF" rx="256" ry="256" width="512" height="512" />
                    <rect fill="#4B4B4B" rx="19.8" ry="19.8" x="69.39" y="126.33" width="373.21" height="275.33" />
                    <rect fill="#A7A7A7" x="84.12" y="141.56" width="342.24" height="245.04" />
                    <rect fill="#FFFFFF" x="84.12" y="141.56" width="342.24" height="231.62" />
                    <rect fill="#E5E5E5" x="84.12" y="141.56" width="171.12" height="231.62" />
                    <polygon fill="#FFFFFF"
                        points="255.25 141.56 124.42 81.42 124.42 333.82 255.25 373.17 255.25 141.56" />
                    <path fill="#FFB900"
                        d="M267.39,107.23H271a12.14,12.14,0,0,1,12.14,12.14V293a0,0,0,0,1,0,0H255.25a0,0,0,0,1,0,0V119.37A12.14,12.14,0,0,1,267.39,107.23Z" />
                    <polygon fill="#FFB900"
                        points="255.25 293.05 255.25 307.11 269.2 297.43 283.15 307.11 283.15 293.05 255.25 293.05" />
                    <path fill="#FF4000"
                        d="M325.31,228.21l24.49-63.78h9.09L385,228.21h-9.61l-7.44-19.32H341.28l-7,19.32ZM343.71,202h21.62l-6.66-17.66q-3-8-4.52-13.23a81.29,81.29,0,0,1-3.44,12.18Z" />
                    <rect fill="#A7A7A7" x="294.77" y="243.46" width="120.78" height="7.74" />
                    <rect fill="#A7A7A7" x="294.77" y="262.43" width="120.78" height="7.74" />
                    <rect fill="#A7A7A7" x="294.77" y="282.17" width="120.78" height="7.74" />
                    <rect fill="#A7A7A7" x="294.77" y="301.47" width="120.78" height="7.74" />
                    <rect fill="#A7A7A7" x="294.77" y="319.4" width="120.78" height="7.74" />
                </svg>
                <p class="text-xl font-bold text-indigo-600">{{$course->name}}</p>
            </div>
            <p class="my-2 font-bold text-indigo-800">
                Clave de la materia:
                <span class="font-normal text-gray-600">{{$course->subject->subjectID}}</span>
            </p>
            @role('docente')
            <p class="my-2 font-bold text-indigo-800">
                Estudiantes:
                <span class="font-normal text-gray-600">{{$course->studentCourses->count()}}</span>
            </p>
            <div class="flex justify-end">
                <a href="{{route('courses.qualifications',$course->id)}}"
                    class="flex px-4 py-2 ml-4 font-bold text-white bg-green-600 rounded-2xl hover:bg-green-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Calificar
                </a>
            </div>
            @endrole
            @role('alumno')
            <p class="my-2 font-bold text-indigo-800">
                Docente:
                <span class="font-normal text-gray-600">
                    @foreach($course->subject->teacherSubjects as $teacherSubject)
                    {{ $teacherSubject->teacher->first_name.' '.$teacherSubject->teacher->father_surname.'
                    '.$teacherSubject->teacher->fathers_last_name }}
                    @endforeach 
                </span>
            </p>
            <p class="my-2 font-bold text-indigo-800">
                Calificación final:
                <span class="font-normal text-gray-600">
                    @if ($course->qualifications->count() > 0)
                    @foreach ($course->qualifications as $qualification)
                    <tr>
                        @if ($qualification->promedio_final)
                        <td>{{ $qualification->promedio_final }}</td>
                        @else
                        <td>No capturada</td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <td>No capturada</td>
                    @endif

                </span>
            </p>
            <div class="my-2 border border-gray-300"></div>
            <p class="my-2 font-bold text-indigo-800">
                Calificaciones Parciales
            </p>
            <div class="flex gap-4">
                <div class="flex-1 p-1 text-center text-white bg-blue-600 rounded-2xl">
                    P1:
                    @if ($course->qualifications->count() > 0)
                    @foreach ($course->qualifications as $qualification)
                    <tr>
                        @if ($qualification->p1)
                        <td>{{ $qualification->p1 }}</td>
                        @else
                        <td>NC</td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <td>NC</td>
                    @endif
                </div>
                <div class="flex-1 p-1 text-center text-white bg-blue-600 rounded-2xl">
                    P2:
                    @if ($course->qualifications->count() > 0)
                    @foreach ($course->qualifications as $qualification)
                    <tr>
                        @if ($qualification->p2)
                        <td>{{ $qualification->p2 }}</td>
                        @else
                        <td>NC</td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <td>NC</td>
                    @endif

                </div>
                <div class="flex-1 p-1 text-center text-white bg-blue-600 rounded-2xl">
                    P3:
                    @if ($course->qualifications->count() > 0)
                    @foreach ($course->qualifications as $qualification)
                    <tr>
                        @if ($qualification->p3)
                        <td>{{ $qualification->p3 }}</td>
                        @else
                        <td>NC</td>
                        @endif
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>NC</td>
                    </tr>
                    @endif
                </div>
            </div>
            <div class="my-3 border border-gray-300"></div>
            <div class="flex justify-end">
                <a href="{{ asset('storage/temarios/' . $course->subject->syllabus) }}" target="_blank"
                    rel="noreferrer noopener"
                    class="px-4 py-2 font-bold text-white bg-blue-600 rounded-2xl hover:bg-blue-700">
                    Ver temario
                </a>
            </div>
            @endrole
        </div>
        @empty
        @role('alumno')
        <div
            class="col-span-3 bg-white border border-gray-200 rounded-lg shadow vp-6 dark:bg-gray-800 dark:border-gray-700">
            <p class="p-4 text-base text-center text-gray-600">No estás registrado a ningún grupo</p>
        </div>
        @endrole
        @role('docente')
        <div
            class="col-span-3 bg-white border border-gray-200 rounded-lg shadow vp-6 dark:bg-gray-800 dark:border-gray-700">
            <p class="p-4 text-base text-center text-gray-600">No tiene grupos Asignados</p>
        </div>
        @endrole
        @endforelse
    </div>
</div>