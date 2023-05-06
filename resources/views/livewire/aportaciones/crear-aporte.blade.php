    <form action="" class="space-y-5 md:w-1/2" wire:submit.prevent='crearAporte'>
        <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
            <h2 class="flex justify-center text-xl font-bold text-indigo-600">Registro de aportaciones</h2>
                    <div>
                        <label for="student_id">Estudiante:</label>
                            <input wire:model="student_id" id="student_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"    
                                placeholder="Ingrese la Matricula del estudiante">
                            @error('student_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
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
                        <textarea id="description" wire:model="description"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                            name="mi-textarea" id="mi-textarea" rows="5" :value="old('description')"></textarea>
                          <div class="block mt-2">
                            <x-alert-danger :messages="$errors->get('description')" />
                            </div>
                    </div> 
                        <div>
                            <label for="contribution_date"
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
                            <label for="deadline_date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha
                                de aportacion realizada
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
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>