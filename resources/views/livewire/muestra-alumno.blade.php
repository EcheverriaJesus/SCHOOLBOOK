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
    <article class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10 border">
        <h2 class="pb-5 pt-5 flex justify-center text-xl font-bold text-indigo-600">General</h2>
        <section class="sm:flex justify-around pb-5">
        <div class="flex justify-center items-center h-auto">
                <img class="transition delay-700 duration-300 ease-in-out w-40 overflow-hidden rounded-[50%] shadow-2xl flex items-center justify-center"
                    src="{{ asset('storage/imageStudents/' . $student->photo) }}"
                    alt="{{ 'Imagen ' . $student->student_name }}">
            </div>      
            <div class="space-y-3">
                <p class="pt-5 sm:text-base font-semibold">Nombre:
                    <span class="font-normal normal-case text-gray-600">{{ $student->student_name . ' ' . $student->paternal_surname . ' ' . $student->maternal_surname }}</span>
                </p>
                <p class="text-base font-semibold">Grado:
                    <span class="font-normal normal-case text-gray-600">{{ $student->grade }}</span>
                </p>
                <p class="text-base font-semibold">Fecha de Nacimiento:
                    <span class="font-normal normal-case text-gray-600">{{ $student->birth_date }}</span>
                </p>
                <p class="text-base font-semibold">CURP:
                    <span class="font-normal normal-case text-gray-600">{{ $student->curp }}</span>
                </p>
                <p class="text-base font-semibold">Genero:
                    <span class="font-normal normal-case text-gray-600">{{ $student->gender }}</span>
                </p>
                <p class="text-base font-semibold">Email:
                    <span class="font-normal normal-case text-gray-600">{{ $student->email }}</span>
                </p>
                <p class="text-base font-semibold">Telefono:
                    <span class="font-normal normal-case text-gray-600">{{ $student->phone }}</span>
                </p>
                <p class="text-base font-semibold">Estado:
                    <span class="font-normal normal-case text-gray-600">
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
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10 border">
        <h2 class="pb-5 pt-5 flex justify-center text-xl font-bold text-indigo-600">Contacto</h2>
        <div class="p-4 grid grid-cols-2 space-y-3">
            <p class="text-base font-semibold">Calle:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->street }}</span>
            </p>
            <p class="text-base font-semibold">No Interior:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->num_int }}</span>
            </p>
            <p class="text-base font-semibold">No Exterior:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->num_ext }}</span>
            </p>
            <p class="text-base font-semibold">Colonia/Fraccionamineto:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->neighborhood }}</span>
            </p>
            <p class="text-base font-semibold">Municipio:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->city }}</span>
            </p>
            <p class="text-base font-semibold">Estado:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->state }}</span>
            </p>
            <p class="text-base font-semibold">Pais:
                <span class="font-normal normal-case text-gray-600">{{ $student->address->country }}</span>
            </p>
        </div>
    </section>


    {{-- Datos Tutor--}}
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10 border">
        <h2 class="pb-5 pt-5 flex justify-center text-xl font-bold text-indigo-600">Documentos</h2>
        <div class="p-4 grid grid-cols-2 space-y-3">
            <p class="text-base font-semibold">Nombre del Tutor:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->tutor_name }}</span>
            </p>
            <p class="text-base font-semibold">Apellido Paterno:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->paternal_surname }}</span>
            </p>
            <p class="text-base font-semibold">Apellido Materno:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->maternal_surname }}</span>
            </p>
            <p class="text-base font-semibold">Genero:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->gender }}</span>
            </p>
            <p class="text-base font-semibold">Email:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->email }}</span>
            </p>
            <p class="text-base font-semibold">Telefono:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->phone }}</span>
            </p>
        </div>
        <div class="p-4 grid grid-cols-2 space-y-3">
        <p class="text-base font-semibold">Calle:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->street }}</span>
            </p>
            <p class="text-base font-semibold">No Interior:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->num_int }}</span>
            </p>
            <p class="text-base font-semibold">No Exterior:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->num_ext }}</span>
            </p>
            <p class="text-base font-semibold">Colonia/Fraccionamineto:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->neighborhood }}</span>
            </p>
            <p class="text-base font-semibold">Municipio:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->city }}</span>
            </p>
            <p class="text-base font-semibold">Estado:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->state }}</span>
            </p>
            <p class="text-base font-semibold">Pais:
                <span class="font-normal normal-case text-gray-600">{{ $student->tutor->address->country }}</span>
            </p>
        </div>
    </section>
</div>
