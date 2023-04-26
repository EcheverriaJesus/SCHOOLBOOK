<div class="p-10">
    <div class="flex justify-start mb-1">
        <h3 class="my-3 text-2xl font-bold text-indigo-600">
            Asignación de Docentes  
        </h3>
    </div>
    
    <p class="my-2">Asigna un docente a una materia</p>

    {{-- Informacion materia --}}
    <section class="w-full h-auto mb-10 bg-white border shadow-xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center pt-5 pb-5 text-xl font-bold text-indigo-600">Información de la materia</h2>
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
                        value="" readonly>
                </div>
                <div>
                    <label for="nombre" class="block font-medium text-gray-700">Nombre:</label>
                    <input id="nombre" type="text"
                        class="w-full px-2 py-1 mt-1 bg-gray-100 border-gray-300 rounded-md readonly"
                        value=""
                        readonly>
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

</div>