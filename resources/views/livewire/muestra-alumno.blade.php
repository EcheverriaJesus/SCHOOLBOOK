<div class="p-10">
    <div class="flex justify-start">
        <a href="{{ route('students.index') }}" class="p-1 bg-indigo-600 rounded-full">
            <svg width="24" height="24" fill="none" stroke="#ffffff" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75">
                </path>
            </svg>
        </a>
    </div>
    <div class="flex justify-center mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            Información del Alumno
        </h3>
    </div>

    {{-- Informacion del Alumno --}}
    <article class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">General</h2>
        <section class="justify-around pb-5 sm:flex">
        <div class="flex items-center justify-center h-auto">
                <img class="transition delay-700 duration-300 ease-in-out w-40 overflow-hidden rounded-[50%] shadow-2xl flex items-center justify-center"
                    src="{{ asset('storage/imageStudents/' . $student->photo) }}"
                    alt="{{ 'Imagen ' . $student->student_name }}">
            </div>      
            <div class="space-y-3">
                <p class="pt-5 font-semibold sm:text-base">Nombre:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->student_name . ' ' . $student->paternal_surname . ' ' . $student->maternal_surname }}</span>
                </p>
                <p class="font-semibold sm:text-base">Matricula:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->studentID}}</span>
                </p>
                <p class="text-base font-semibold">Grado:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->grade }}</span>
                </p>
                <p class="text-base font-semibold">Fecha de Nacimiento:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->birth_date }}</span>
                </p>
                <p class="text-base font-semibold">CURP:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->curp }}</span>
                </p>
                <p class="text-base font-semibold">Genero:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->gender }}</span>
                </p>
                <p class="text-base font-semibold">Email:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->email }}</span>
                </p>
                <p class="text-base font-semibold">Telefono:
                    <span class="font-normal text-gray-600 normal-case">{{ $student->phone }}</span>
                </p>
                <p class="text-base font-semibold">Estado:
                    <span class="font-normal text-gray-600 normal-case">
                        @switch($student->status)
                        @case('0')
                            {{'Inactivo'}}
                            @break
                        @case('1')
                            {{'Activo'}}
                            @break
                        @default
                        @endswitch
                    </span>
                </p>
            </div>
        </section>
    </article>

    {{-- Informacion Contacto --}}
    <section class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Contacto</h2>
        <div class="grid grid-cols-2 p-4 space-y-3">
            <p class="text-base font-semibold">Calle:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->street }}</span>
            </p>
            <p class="text-base font-semibold">No Interior:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->num_int }}</span>
            </p>
            <p class="text-base font-semibold">No Exterior:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->num_ext }}</span>
            </p>
            <p class="text-base font-semibold">Colonia/Fraccionamineto:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->neighborhood }}</span>
            </p>
            <p class="text-base font-semibold">Municipio:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->city }}</span>
            </p>
            <p class="text-base font-semibold">Estado:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->state }}</span>
            </p>
            <p class="text-base font-semibold">Pais:
                <span class="font-normal text-gray-600 normal-case">{{ $student->address->country }}</span>
            </p>
        </div>
    </section>

{{-- Documentacion --}}
    <section class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Documentos</h2>
        <div class="grid grid-cols-2 p-4 space-y-3">
            <p class="text-base font-semibold">Nombre del Documento:
                <span class="font-normal text-gray-600 normal-case">{{ $student->document->document_name }}</span>
            </p>
            <p class="text-base font-semibold">Estado del Documento:
                    <span class="font-normal text-gray-600 normal-case">
                        @switch($student->document->status)
                        @case('0')
                            {{'Inactivo'}}
                            @break
                        @case('1')
                            {{'Activo'}}
                            @break
                        @default
                        @endswitch
                    </span>
                </p>
            <a href="{{ asset('storage/fileStudents/' . $student->file) }}" target="_blank"
                    rel="noreferrer noopener"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border border-transparent rounded-md hover:bg-blue-600">
                    Ver Documento Alumno
                </a>
        </div>
    </section>

    {{-- Datos Tutor--}}
    <section class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Documentos</h2>
        <div class="grid grid-cols-2 p-4 space-y-3">
            <p class="text-base font-semibold">Nombre del Tutor:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->tutor_name }}</span>
            </p>
            <p class="text-base font-semibold">Apellido Paterno:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->paternal_surname }}</span>
            </p>
            <p class="text-base font-semibold">Apellido Materno:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->maternal_surname }}</span>
            </p>
            <p class="text-base font-semibold">Genero:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->gender }}</span>
            </p>
            <p class="text-base font-semibold">Email:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->email }}</span>
            </p>
            <p class="text-base font-semibold">Telefono:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->phone }}</span>
            </p>
        </div>
        <div class="grid grid-cols-2 p-4 space-y-3">
        <p class="text-base font-semibold">Calle:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->street }}</span>
            </p>
            <p class="text-base font-semibold">No Interior:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->num_int }}</span>
            </p>
            <p class="text-base font-semibold">No Exterior:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->num_ext }}</span>
            </p>
            <p class="text-base font-semibold">Colonia/Fraccionamineto:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->neighborhood }}</span>
            </p>
            <p class="text-base font-semibold">Municipio:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->city }}</span>
            </p>
            <p class="text-base font-semibold">Estado:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->state }}</span>
            </p>
            <p class="text-base font-semibold">Pais:
                <span class="font-normal text-gray-600 normal-case">{{ $student->tutor->address->country }}</span>
            </p>
        </div>
    </section>
</div>
