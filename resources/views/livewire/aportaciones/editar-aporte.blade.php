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
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editar Aportaciones Escolares</h3>
                        <form class="space-y-6" wire:submit.prevent='editarCiclo' novalidate>
                        <div>       
                            <label for="amount"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monto de Aportacion</label>
                            <input wire:model.defer="amount" type="text" name="amount" id="amount"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Escribe la cantidad de Aporte a realizar">
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('amount')" />
                            </div>
                        </div>
                        <div>
                        <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion de la Aportacion</label>
                        <input wire:model.defer="description" type="text" name="description" id="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Escribe la cantidad de Aporte a realizar">
                          <div class="block mt-2">
                            <x-alert-danger :messages="$errors->get('description')" />
                            </div>
                    </div> 
                        <div>
                            <label for="" class="text-sm ">Fecha actual del inicio la Aportacion:
                                <span class="block mb-4 font-bold">{{$contribution_date}}</span>
                            </label>
                            <label for="contribution_date_new"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                de inicio</label>
                            <input wire:model.defer="contribution_date" type="date" name="contribution_date" id="contribution_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Escribe la fecha de inicio del Aporte" required>
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('contribution_date')" />
                            </div>
                        </div>
                        <div>
                            <label for="" class="text-sm ">Fecha actual de Fin de la Aportacion:
                                <span class="block mb-4 font-bold">{{$deadline_date}}</span>
                            </label>
                            <label for="deadline_date_new"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                de fin
                            </label>
                            <input wire:model.defer="deadline_date" type="date" name="deadline_date" id="deadline_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Fecha limite" required>
                            <div class="block mt-2">
                                <x-alert-danger :messages="$errors->get('deadline_date')" />
                            </div>
                        </div>
                        <div class="block">
                            <label for="checkbox" class="block mb-2 text-sm">Estatus del Aporte:</label>
                            <div class="flex items-center mb-4">
                                <input wire:model.defer="status" id="checkbox" type="checkbox" value="1"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Activo
                                </label>
                                <div class="block mt-2">
                                    <x-alert-danger :messages="$errors->get('checkbox')" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="student_id">Estudiante:</label>
                            <select wire:model="student_id" id="student_id">
                                <option value="">Seleccione un estudiante</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->student_name }}</option>
                                @endforeach
                            </select>
                            @error('student_id') <span class="error">{{ $message }}</span> @enderror
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

    