<div class="p-10">
    <div class="flex justify-start">
        <a href="{{ route('teachers.index') }}" class="p-1 bg-indigo-600 rounded-full">
            <svg width="24" height="24" fill="none" stroke="#ffffff" stroke-width="2" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75">
                </path>
            </svg>
        </a>
    </div>
    <div class="flex justify-center mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            Información del profesor
        </h3>
    </div>

    {{-- Informacion del Docente --}}
    <article class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10">
        <h2 class="pb-5 flex justify-center text-xl font-bold text-indigo-600">Informacion General</h2>
        <section class="sm:flex justify-around pb-5">
            <div class="flex justify-center items-center h-auto">
                <img class="transition delay-700 duration-300 ease-in-out w-40 overflow-hidden rounded-[50%] shadow-2xl flex items-center justify-center"
                    src="{{ asset('storage/imageTeachers/' . $teacher->photo) }}"
                    alt="{{ 'Imagen vacante ' . $teacher->first_name }}">
            </div>
            <div class="space-y-3">
                <p class="pt-5 sm:text-base font-semibold">Nombre:
                    <span
                        class="font-normal normal-case text-gray-600">{{ $teacher->first_name . ' ' . $teacher->father_surname . ' ' . $teacher->fathers_last_name }}</span>
                </p>
                <p class="text-base font-semibold">CURP:
                    <span class="font-normal normal-case text-gray-600">{{ $teacher->curp }}</span>
                </p>
                <p class="text-base font-semibold">RFC:
                    <span class="font-normal normal-case text-gray-600">{{ $teacher->rfc }}</span>
                </p>
                <p class="text-base font-semibold">Email:
                    <span class="font-normal normal-case text-gray-600">{{ $teacher->email }}</span>
                </p>
                <p class="text-base font-semibold">Telefono:
                    <span class="font-normal normal-case text-gray-600">{{ $teacher->phone }}</span>
                </p>
                <a href="{{ asset('storage/cedProfessional/' . $teacher->professional_license) }}" target="_blank"
                    rel="noreferrer noopener"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border border-transparent rounded-md hover:bg-blue-600">
                    Ver Ced. Profesional
                </a>
            </div>
        </section>
    </article>

    {{-- Informacion Academica --}}
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10">
        <h2 class="pb-5 flex justify-center text-xl font-bold text-indigo-600">Informacion Academica</h2>
        <div class="flex justify-around pb-5">
            <p class="text-base font-semibold">Nivel de estudios:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->education_level }}</span>
            </p>
            <p class="text-base font-semibold">Especialidad:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->major }}</span>
            </p>
        </div>
    </section>

    {{-- Informacion Contacto --}}
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10">
        <h2 class="pb-5 flex justify-center text-xl font-bold text-indigo-600">Informacion de Contacto</h2>
        <div class="p-4 grid grid-cols-2 space-y-3">
            <p class="text-base font-semibold">Calle:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->street }}</span>
            </p>
            <p class="text-base font-semibold">No Interior:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->num_int }}</span>
            </p>
            <p class="text-base font-semibold">No Exterior:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->num_ext }}</span>
            </p>
            <p class="text-base font-semibold">Colonia/Fraccionamineto:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->neighborhood }}</span>
            </p>
            <p class="text-base font-semibold">Municipio:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->city }}</span>
            </p>
            <p class="text-base font-semibold">Estado:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->state }}</span>
            </p>
            <p class="text-base font-semibold">Pais:
                <span class="font-normal normal-case text-gray-600">{{ $teacher->address->country }}</span>
            </p>
        </div>
    </section>
</div>
