<div>
    <div class="my-5">
        <h1 class="text-2xl font-extrabold text-indigo-600">Ciclos Escolares</h1>
        <p class="my-2">Visualizar y editar los datos de los ciclos escolares</p>
    </div>
    <div class="block w-full mb-2 md:justify-between md:flex ">
        <livewire:ciclos-escolares.buscar-ciclo-escolar />
        <livewire:ciclos-escolares.crear-ciclo />
    </div>

    <div class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-blue-600 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w-1/3 px-6 py-3 text-center">
                            Ciclo escolar
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Fecha de inicio
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Fecha de fin
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Estatus
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schoolCycles as $schoolCycle)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="w-1/3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$schoolCycle->cycle_name}}
                        </th>
                        <td class="px-6 py-4 text-center">
                            {{$schoolCycle->start_date->formatLocalized('%d/%B/%Y')}}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{$schoolCycle->end_date->formatLocalized('%d/%B/%Y')}}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($schoolCycle->status ==  1)
                            <div class="flex items-center ">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Activo
                            </div>
                            @else
                            <div class="flex items-center ">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Finalizado
                            </div>
                            @endif
                        </td>
                        <td class="flex justify-center px-6 py-4 space-x-4 text-center">
                            <button wire:click="$emit('setData', {{$schoolCycle->id}})" data-modal-target="authentication-modal-edit" data-modal-toggle="authentication-modal-edit"
                                class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-green-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                            <button wire:click="$emit('mostrarAlerta', {{$schoolCycle->id}})"
                                class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if ($data->count() == 0)
        <p class="p-3 text-sm text-center text-gray-600"> No hay Ciclos Escolares por mostrar</p>
        @elseif (!empty($searchTerm) && $schoolCycles->count() == 0)
        <p class="p-3 text-sm text-center text-gray-600"> No hay coincidencias para su búsqueda</p>
        @endif   
    </div>
    <div class="mt-10">
        {{$schoolCycles->links()}}
    </div>

 <!-- Modal Edit -->
    <div>
        <!-- Main modal -->
        <div wire:ignore.self id="authentication-modal-edit" tabindex="-1" aria-hidden="true" 
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
            <div class="relative w-full h-full max-w-md md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="authentication-modal-edit">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar ciclo
                            escolar</h3>
                        <form class="space-y-6" wire:submit.prevent='editarCiclo' novalidate>
                            <div>
                                <label for="nombre"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                    del ciclo escolar</label>
                                <input wire:model="nombre" type="text" name="nombre" id="nombre" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Escribe el nombre del ciclo escolar">
                                <div class="block mt-2">
                                    <x-alert-danger :messages="$errors->get('nombre')" />
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm ">Fecha actual de inicio del ciclo escolar:
                                    <span class="block mb-4 font-bold">{{$fecha_inicio}}</span>
                                </label>
                                <label for="fecha_inicio_nueva"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cambiar Fecha
                                    de inicio</label>
                                <input wire:model="fecha_inicio_nueva" type="date" name="fecha_inicio_nueva" id="fecha_inicio_nueva" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Escribe la fecha de inicio del ciclo" required>
                                <div class="block mt-2">
                                    <x-alert-danger :messages="$errors->get('fecha_inicio_nueva')" />
                                </div>
                            </div>
                            <div>
                                <label for="" class="text-sm ">Fecha actual del fin del ciclo escolar:
                                    <span class="block mb-4 font-bold">{{$fecha_fin}}</span>
                                </label>
                                <label for="fecha_fin_nueva"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cambiar Fecha
                                    de fin
                                </label>
                                <input wire:model="fecha_fin_nueva" type="date" name="fecha_fin_nueva" id="fecha_fin_nueva"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Escribe la fecha de fin del ciclo" required>
                                <div class="block mt-2">
                                    <x-alert-danger :messages="$errors->get('fecha_fin_nueva')" />
                                </div>
                            </div>
                            <div class="block">
                                <label for="estatus" class="block mb-2 text-sm">Estatus del ciclo escolar:</label>
                                <div class="flex items-center mb-4">
                                    <input wire:model="estatus" id="estatus" type="checkbox" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Activo
                                    </label>
                                    <div class="block mt-2">
                                        <x-alert-danger :messages="$errors->get('estatus')" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>




@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', (cycleId) => {
    Swal.fire({
        title: '¿Eliminar El Ciclo Escolar?',
        text: "Un Ciclo Escolar eliminado ya no se podrá recuperar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Eliminar!',
        cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    //Eliminar profesor desde servidor (Emitir evento hacia el componente)
    Livewire.emit('deleteCycle',cycleId)
    Swal.fire(
      'Se Eliminó El Ciclo Escolar',
      'Eliminado Correctamente',
      'success'
    )
  }
})
})
</script>
@endpush