<form class="space-y-5 md:w-full" wire:submit.prevent='crearGrupo'>

    <section class="grid w-full h-auto p-6 mb-10 bg-white border shadow-2xl md:gap-4 md:grid-cols-2 sm:bg-white rounded-xl">

        <div class="w-full">
            <x-label for="grado" value="{{ __('Materia') }}" />
            <select id="grado" wire:model="grado"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione la materia --</option>
                
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('grado')" />
            </div>
        </div>

        <div class="w-full">
            <x-label for="grado" value="{{ __('Ciclo escolar') }}" />
            <select id="grado" wire:model="grado"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el Ciclo Escolar --</option>
                
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('grado')" />
            </div>
        </div>

        <div class="w-full">
            <x-label for="grado" value="{{ __('Grupo') }}" />
            <select id="grado" wire:model="grado"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el grupo --</option>
                <option value="A">A</option>
                <option value="B">B</option>
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('grado')" />
            </div>
        </div>
        
    </section>

    <!-- Temario-->
    <section class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Temario</h2>
        <div>
            <x-label for="temario" value="{{ __('Seleccione el archivo PDF del temario') }}" />
            <x-input id="temario" class="block w-full mt-1" wire:model="temario" type="file" accept="pdf/*" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('temario')" />
            </div>
        </div>

        <x-button class="ml-4">
            {{ __('Guardar') }}
        </x-button>
    </section>
</form>
