<div class="mt-5">

    <!-- Modal toggle -->
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
        class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg>
        <label class="ml-1">Añadir</label>
    </button>

    <!-- Main modal -->
    <div wire:ignore.self id="authentication-modal" tabindex="-1" aria-hidden="true" 
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Registro de ciclo
                        escolar</h3>
                    <form class="space-y-6" wire:submit.prevent='crearCiclo' novalidate>
                        <div>
                            <label for="nombre"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre
                                del ciclo escolar</label>
                            <input wire:model.defer="nombre" type="text" name="nombre" id="nombre"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Escribe el nombre del ciclo escolar">
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('nombre')" />
                            </div>
                        </div>
                        <div>
                            <label for="fecha_inicio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                de inicio</label>
                            <input wire:model.defer="fecha_inicio" type="date" name="fecha_inicio" id="fecha_inicio"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Escribe la fecha de inicio del ciclo" required>
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('fecha_inicio')" />
                            </div>
                        </div>
                        <div>
                            <label for="fecha_fin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                de fin
                            </label>
                            <input wire:model.defer="fecha_fin" type="date" name="fecha_fin" id="fecha_fin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Escribe la fecha de fin del ciclo" required>
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('fecha_fin')" />
                            </div>
                        </div>
                        <div class="block">
                            <label for="checkbox" class="block mb-2 text-sm">Estatus del ciclo escolar:</label>
                            <div class="flex items-center mb-4">
                                <input wire:model.defer="estatus" id="checkbox" type="checkbox" value="1"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Activo
                                </label>
                                <div class="block mt-2">
                                    <x-alert-danger :messages="$errors->get('checkbox')" />
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

@push('scripts')
<script>
    // Obtener el modal
    var modal = document.getElementById("authentication-modal");

    // Cuando se hace clic en el botón de cerrar
    modal.querySelector('[data-modal-hide]').addEventListener('click', function() {
        livewire.emit('resetForm');
    });

    // Cuando se hace clic fuera del modal
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            livewire.emit('resetForm');
        }
    });
</script>
@endpush