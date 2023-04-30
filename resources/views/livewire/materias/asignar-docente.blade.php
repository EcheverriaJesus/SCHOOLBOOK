<div class="p-10">
    <div class="flex justify-start mb-1">
        <h3 class="my-3 text-2xl font-bold text-indigo-600">
            Asignación de Materias
        </h3>
    </div>

    <p class="my-2">Asigna una materia a un docente</p>

    {{-- Informacion materia --}}
    <section class="w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <div class="my-1">
            <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Información de la Materia</h2>
            <div class="block w-full m-5 md:w-3/5">
                <form wire:submit.prevent='buscarMateria'>
                    <label for="default-search" class="mb-2 text-base font-medium text-gray-700">Buscar Materia</label>
                    <div class="flex">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="#1A56DB" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input wire:model='buscarMateria' type="search" id="default-search"
                                class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Buscar por clave">
                        </div>
                        <button type="submit"
                            class="items-center p-3 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-900 border border-transparent rounded-md hover:bg-blue-800">
                            Buscar
                        </button>
                    </div>
                </form>
                <div class="block my-2 md:w-1/2">
                    <x-alert-danger :messages="$errors->get('buscarMateria')" />
                </div>
            </div>
            <div class="m-5 bg-white rounded-lg">
                <h2 class="text-xl text-center text-indigo-600 ">Datos de la Materia</h2>
                <div class="py-1 border-b border-blue-300"></div>
                <div class="grid grid-cols-1 gap-4 mx-5 mt-1 sm:grid-cols-2">
                    <div>
                        <label for="nombreMateria" class="block font-medium text-gray-700">Nombre:</label>
                        <input id="nombreMateria" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$subject?->subject_name}}" readonly>
                    </div>
                    <div>
                        <label for="grado" class="block font-medium text-gray-700">Grado:</label>
                        <input id="grado" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$subject?->grade ? $subject->grade . '°' : ''}}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-1">
            <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Información del Profesor</h2>
            <div class="block w-full m-5 md:w-3/5">
                <form wire:submit.prevent='buscarProfesor'>
                    <label for="default-search2" class="mb-2 text-base font-medium text-gray-700">Buscar
                        Profesor</label>
                    <div class="flex">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                    stroke="#1A56DB" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input wire:model='buscarProfesor' type="search" id="default-search2"
                                class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Buscar por clave">
                        </div>
                        <button type="submit"
                            class="items-center p-3 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-900 border border-transparent rounded-md hover:bg-blue-800">
                            Buscar
                        </button>
                    </div>
                </form>
                <div class="block my-2 md:w-1/2">
                    <x-alert-danger :messages="$errors->get('buscarProfesor')" />
                </div>
            </div>
            <div class="m-5 bg-white rounded-lg">
                <h2 class="text-xl text-center text-indigo-600 ">Datos del Profesor</h2>
                <div class="py-1 border-b border-blue-300"></div>
                <div class="grid grid-cols-1 gap-4 mx-5 mt-1 sm:grid-cols-2">
                    <div>
                        <label for="nombreProfesor" class="block font-medium text-gray-700">Nombre:</label>
                        <input id="nombreProfesor" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$teacher?->first_name.' '.$teacher?->father_surname.' '.$teacher?->fathers_last_name}}"
                            readonly>
                    </div>
                    <div>
                        <label for="curp" class="block font-medium text-gray-700">CURP:</label>
                        <input id="curp" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$teacher?->curp}}" readonly>
                    </div>
                    <div>
                        <label for="correo" class="block font-medium text-gray-700">Correo:</label>
                        <input id="correo" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$teacher?->email}}" readonly>
                    </div>
                    <div>
                        <label for="telefono" class="block font-medium text-gray-700">Teléfono:</label>
                        <input id="telefono" type="text"
                            class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                            value="{{$teacher?->phone}}" readonly>
                    </div>
                </div>
                <div class="flex justify-end my-4">
                    <button wire:click="asignarProfesor"
                        class="items-center p-2 px-4 ml-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-900 border border-transparent rounded-md hover:bg-blue-800">
                        Asignar profesor
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Lista de alumnos inscritos--}}
    <section class="w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="my-3 text-xl text-center text-indigo-600">Lista de Materias</h2>
        <div class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
            @if(count($subjects) > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Clave de la Materia
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nombre de la materia
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Clave del Docente
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Nombre del docente
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$subject->subjectID}}
                            </th>
                            <td class="w-1/4 px-6 py-4 text-center ">
                                {{$subject->subject_name}}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if ($subject->teacherID)
                                {{$subject->teacherID}}
                                @else
                                <label>---</label>
                                @endif
                            </td>
                            <td class="w-1/4 px-6 py-4 text-center">
                                @if ($subject->teacherID)
                                {{$subject->first_name.' '.$subject->father_surname.' '.$subject->fathers_last_name}}
                                @else
                                <label>No Asignado</label>
                                @endif
                            </td>
                            <td class="flex justify-center px-6 py-4 space-x-4 text-center">
                                @if ($subject->teacherID)
                                <button
                                    wire:click="$emit('mostrarAlerta','{{$subject->teacherID}}','{{$subject->subjectID}}')"
                                    class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="p-3 text-base text-center text-gray-600"> No hay Materias Registradas</p>
            @endif
        </div>
    </section>
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
    Livewire.on('mostrarAlerta', (teacherId, subjectId) => {
    Swal.fire({
        title: '¿Eliminar el Docente asignado a esta Materia?',
        text: "La asignación del Docente ya no se podrá recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Eliminar!',
        cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    Livewire.emit('deleteAssign',teacherId, subjectId)
    Swal.fire(
      'Se Eliminó el Docente asignado a esta Materia',
      'Eliminada Correctamente',
      'success'
    )
  }
})
})
</script>
@endpush