<x-button_back>
    <x-slot name="route"> {{route('subjects.index')}} </x-slot>
    {{ __('subjects.index') }}
</x-button_back>
<div class="p-10">
    <div class="flex justify-center mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            Información de la materia
        </h3>
    </div>

    {{-- Informacion Materia --}}
    <section class="w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">{{ $subject->subject_name }}</h2>
        <div class="block pb-5 m-6">
            <label class="block text-base font-semibold">Descripción:</label>
            <p class="font-normal text-gray-600 normal-case">{{ $subject->description}}</p>
            <p class="mt-1 text-base font-semibold">Grado:
                <span class="font-normal text-gray-600 normal-case">{{ $subject->grade.'°' }}</span>
            </p>
            <a href="{{ asset('storage/temarios/' . $subject->syllabus) }}" target="_blank"
                rel="noreferrer noopener"
                class="inline-flex items-center px-4 py-2 mt-2 text-xs font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border border-transparent rounded-md hover:bg-blue-600">
                Ver Temario
            </a>
        </div>
    </section>

</div>