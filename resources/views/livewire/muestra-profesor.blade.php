<x-button_back>
    <x-slot name="route"> {{route('teachers.index')}} </x-slot>
     {{ __('teachers.index') }}
   </x-button_back>
<div class="p-10">
    <div class="flex justify-center mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            Información del profesor
        </h3>
    </div>
    @if ($teacher)
        {{-- Informacion del Docente --}}
    <article class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">General</h2>
        <section class="justify-around pb-5 sm:flex">
            <div class="flex items-center justify-center h-auto">
                <img class="transition delay-700 duration-300 ease-in-out w-40 overflow-hidden rounded-[50%] shadow-2xl flex items-center justify-center"
                    src="{{ asset('storage/imageTeachers/' . $teacher->photo) }}"
                    alt="{{ 'Imagen docente ' . $teacher->first_name }}">
            </div>
            <div class="space-y-3">
                <p class="pt-5 font-semibold sm:text-base">Nombre:
                    <span
                        class="font-normal text-gray-600 normal-case">{{ $teacher->first_name . ' ' . $teacher->father_surname . ' ' . $teacher->fathers_last_name }}</span>
                </p>
                <p class="text-base font-semibold">CURP:
                    <span class="font-normal text-gray-600 normal-case">{{ $teacher->curp }}</span>
                </p>
                <p class="text-base font-semibold">RFC:
                    <span class="font-normal text-gray-600 normal-case">{{ $teacher->rfc }}</span>
                </p>
                <p class="text-base font-semibold">Email:
                    <span class="font-normal text-gray-600 normal-case">{{ $teacher->email }}</span>
                </p>
                <p class="text-base font-semibold">Telefono:
                    <span class="font-normal text-gray-600 normal-case">{{ $teacher->phone }}</span>
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
    <section class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Academica</h2>
        <div class="flex justify-around pb-5">
            <p class="text-base font-semibold">Nivel de estudios:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->education_level }}</span>
            </p>
            <p class="text-base font-semibold">Especialidad:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->major }}</span>
            </p>
        </div>
    </section>

    {{-- Informacion Contacto --}}
    <section class="w-auto w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Contacto</h2>
        <div class="grid grid-cols-2 p-4 space-y-3">
            <p class="text-base font-semibold">Calle:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->street }}</span>
            </p>
            <p class="text-base font-semibold">No Interior:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->num_int }}</span>
            </p>
            <p class="text-base font-semibold">No Exterior:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->num_ext }}</span>
            </p>
            <p class="text-base font-semibold">Colonia/Fraccionamineto:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->neighborhood }}</span>
            </p>
            <p class="text-base font-semibold">Municipio:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->city }}</span>
            </p>
            <p class="text-base font-semibold">Estado:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->state }}</span>
            </p>
            <p class="text-base font-semibold">Pais:
                <span class="font-normal text-gray-600 normal-case">{{ $teacher->address->country }}</span>
            </p>
        </div>
    </section>
    @endif
</div>
