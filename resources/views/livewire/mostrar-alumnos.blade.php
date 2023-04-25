<div>
    <div class="my-5">
        <h1 class="text-2xl font-extrabold text-indigo-600">Alumnos</h1>
        <p class="my-2">Visualizar y editar datos de un Alumno</p>
    </div>
    <div class="block w-full md:justify-between md:flex ">
        <livewire:buscar-alumno />
        <div class="flex justify-end my-5">
            <a href="{{route('students.create')}}"
                class="flex items-center px-4 py-2 font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border rounded-md tet-sm border-transparet hover:bg-blue-600">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <label class="ml-1 text-sm">Añadir</label>
            </a>
        </div>
    </div>

    <div class="w-auto w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        @forelse($students as $student)
        <div class="p-6 bg-white border-b border-gray-300 md:flex md:justify-between md:items-center">
            <div class="space-y-1">
                <p class="text-2xl font-bold text-gray-600">{{$student->student_name.' '.$student->paternal_surname.'
                    '.$student->maternal_surname}}</p>
                <p class="text-gray-500 tetxt-sm">{{'Matricula: '.$student->studentID}}</p>
                <p class="text-gray-500 tetxt-sm">{{'Grado: '.$student->grade}}</p>
                <p class="text-gray-500 tetxt-sm">
                    @switch($student->status)
                    @case('0')
                <div class="flex items-center ">
                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Inactivo
                </div>
                @break
                @case('1')
                <div class="flex items-center ">
                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Activo
                </div>
                @break
                @default
                @endswitch
                </p>
            </div>
            <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0 md:flex-row">
                <a href="{{route('students.show', $student)}}"
                    class="flex justify-center gap-2 px-4 py-2 text-xs font-bold text-white uppercase bg-indigo-600 rounded-lg">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                </a>
                <a href="{{route('student.edit',$student->studentID)}}"
                    class="flex justify-center gap-2 px-4 py-2 text-xs font-bold text-white uppercase bg-green-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
                <button wire:click="$emit('mostrarAlerta', {{$student->studentID}})"
                    class="flex justify-center gap-2 px-4 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </div>
        </div>
        @endforeach
        @if (!empty($searchTerm) && $students->count() == 0)
        <p class="p-3 text-sm text-center text-gray-600"> No hay coincidencias para su búsqueda</p>
        @endif
        @if ($data->count() == 0)
        <p class="p-3 text-sm text-center text-gray-600"> No hay Alumnos por mostrar</p>
        @endif
    </div>
    <div class="mt-10">
        {{$students->links()}}
    </div>
</div>
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', (studentId) => {
    Swal.fire({
        title: '¿Eliminar Alumno?',
        text: "Un Alumno Eliminado ya no se podrá recuperar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Eliminar!',
        cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    //Eliminar Alumno desde servidor (Emitir evento hacia el componente)
    Livewire.emit('deleteStudent',studentId)
    Swal.fire(
      'Se Eliminó el Aluumno',
      'Eliminado Correctamente',
      'success'
    )
  }
})
})
</script>
@endpush