<div>
    <x-button_back>
        <x-slot name="route"> {{route('courses.index')}} </x-slot>
        {{ __('courses.index') }}
    </x-button_back>
    <div class="p-10">
        <div class="flex justify-center mb-5">
            <h3 class="my-3 text-2xl font-bold text-gray-800">
                {{$course->name}}
            </h3>
        </div>

        {{-- Info curso --}}
        <section class="w-full h-auto mb-10 bg-white border shadow-sm sm:bg-white rounded-xl">
            <div class="block pb-1 m-6 md:flex">
                <label class="block text-base font-semibold">Ciclo escolar:</label>
                <p class="ml-2 font-normal text-gray-600 normal-case">{{$course->schoolCycles->cycle_name}}</p>
            </div>
        </section>

        {{-- Inscribir alumno --}}
        <section class="w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
            <div class="block w-full m-5 md:w-3/5">
                <form wire:submit.prevent='buscarEstudiante'>
                    <label for="default-search" class="mb-2 text-base font-medium text-gray-700">Buscar Alumno</label>
                    <div class="flex">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="#1A56DB" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input wire:model='buscarAlumno' type="search" id="default-search"
                                class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Buscar por matrícula">
                        </div>
                        <button type="submit"
                            class="items-center p-3 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-900 border border-transparent rounded-md hover:bg-blue-800">
                            Buscar
                        </button>
                    </div>
                </form>
                <div class="block my-2 md:w-1/2">
                    <x-alert-danger :messages="$errors->get('buscarAlumno')" />
                </div>
            </div>
            <div class="m-5 bg-white rounded-lg">
                <h2 class="text-xl text-center text-indigo-600 ">Datos generales del alumno</h2>
                <div class="py-1 border-b border-blue-300"></div>
                <div class="grid grid-cols-1 gap-4 mx-5 mt-1 sm:grid-cols-2">
                    <div>
                        <label for="matricula" class="block font-medium text-gray-700">Matrícula:</label>
                        <input id="matricula" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$student?->studentID}}" readonly>
                    </div>
                    <div>
                        <label for="nombre" class="block font-medium text-gray-700">Nombre:</label>
                        <input id="nombre" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$student?->student_name.' '.$student?->paternal_surname.' '.$student?->maternal_surname}}"
                            readonly>
                    </div>
                    <div>
                        <label for="nombre" class="block font-medium text-gray-700">Grado:</label>
                        <input id="nombre" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$student?->grade}}" readonly>
                    </div>
                    <div>
                        <label for="nombre" class="block font-medium text-gray-700">Correo:</label>
                        <input id="nombre" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$student?->email}}" readonly>
                    </div>
                </div>
                <div class="flex justify-end my-4">
                    <button wire:click="inscribirCurso"
                        class="items-center p-2 px-4 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-900 border border-transparent rounded-md hover:bg-blue-800">
                        Incribir a curso
                    </button>
                </div>
            </div>

        </section>

        {{-- Lista de alumnos inscritos--}}
        <section class="w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
            <h2 class="my-3 text-xl text-center text-indigo-600">Lista de alumnos inscritos</h2>
            <div class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
                @if(count($students) > 0)
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="w-1/3 px-6 py-3 text-center">
                                    Matrícula
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Nombre del alumno
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="w-1/3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$student->student->studentID}}
                                <td class="px-6 py-4 text-center">
                                    {{$student->student->student_name.' '.$student->student->paternal_surname.'
                                    '.$student->student->maternal_surname}}
                                </td>
                                <td class="flex justify-center px-6 py-4 space-x-4 text-center">
                                    <button wire:click="$emit('mostrarAlerta', {{$student->student->studentID}})"
                                        class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                    {{-- <button wire:click="deleteStudent({{$student->student->studentID}})"
                                        class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button> --}}
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="p-3 text-base text-center text-gray-600"> No hay alumnos registrados a este curso</p>
                @endif
            </div>
        </section>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('alertWarning', function (data, title = 'Advertencia') {
    Swal.fire({
        icon: 'warning',
        title: title,
        text: data.message,
        confirmButtonText: 'Aceptar',
    });
});

Livewire.on('alertSuccess', function (data, title = 'Éxito') {
    Swal.fire({
        icon: 'success',
        title: title,
        text: data.message,
        confirmButtonText: 'Aceptar',
        timer: 1500
    });
});    
</script>
<script>
    Livewire.on('mostrarAlerta', (studentId) => {
    Swal.fire({
        title: '¿Eliminar Alumno de este Curso?',
        text: "Un alumno eliminado de este curso ya no se podrá recuperar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Eliminar!',
        cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    //Eliminar alumno desde servidor (Emitir evento hacia el componente)
    Livewire.emit('deleteStudent',studentId)
    Swal.fire(
      'Se Eliminó al Alumno de este Curso',
      'Eliminado Correctamente',
      'success'
    )
  }
})
})
</script>
@endpush