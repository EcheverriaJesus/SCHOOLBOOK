<div class="mt-5">

    <!-- Modal toggle -->
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
        class="flex text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z">
            </path>
        </svg>
        <label class="ml-1 text-base text-center">Fecha limite para calificar</label>
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
                <div class="px-6 py-6 lg:px-10">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Fecha Limite para Enviar
                        Calificaciones
                    </h3>
                    <form class="space-y-6" wire:submit.prevent='establecerFecha' novalidate>
                        @if ($fechaLimite)
                            <p class="p-0 text-base font-bold">Fecha limite actual: <span class="text-base font-normal">{{$fechaLimite}}</span></p>
                        @endif
                        <div>
                            <label for="nombre"
                                class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Establece una fecha
                                limite para calificar
                            </label>
                            <input wire:model.defer="fecha_limite" type="datetime-local" name="fecha_limite"
                                id="fecha_limite"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('fecha_limite')" />
                            </div>
                        </div>
                        <div class="flex p-4 mb-4 text-sm text-justify text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Después</span> de la fecha y hora seleccionada, los docentes
                                no podrán capturar y enviar calificaciones.
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