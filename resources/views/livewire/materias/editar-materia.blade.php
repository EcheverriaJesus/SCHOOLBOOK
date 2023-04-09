<form class="space-y-5 md:w-1/2" wire:submit.prevent='editarMateria'>

    <section class="w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion de la Materia</h2>

        <div>
            <x-label for="nombre" value="{{ __('Nombre de la materia') }}" />
            <x-input id="nombre" class="block w-full mt-1" type="text" wire:model="nombre" :value="old('nombre')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('nombre')" />
            </div>
        </div>

        <div>
            <x-label for="descripción" value="{{ __('Descripcion') }}" />
            <textarea id="descripción" wire:model="descripción"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-blue-200 border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200"
                name="mi-textarea" id="mi-textarea" rows="5" :value="old('subject_name')"></textarea>
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('descripción')" />
            </div>
        </div>

        <div>
            <x-label for="grado" value="{{ __('Grado') }}" />
            <select id="grado" wire:model="grado"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione un grado --</option>
                <option value="1">1°</option>
                <option value="2">2°</option>
                <option value="3">3°</option>
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
            <x-label for="temario_nuevo" value="{{ __('Seleccione el archivo PDF del temario') }}" />
            <x-input id="temario_nuevo" class="block w-full mt-1" wire:model="temario_nuevo" type="file" accept="pdf/*" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('temario_nuevo')" />
            </div>
        </div>
        <div class="md:justify-center md:flex">
            <a href="{{asset('storage/temarios/'.$temario)}}"
                class="flex items-center justify-center px-4 py-2 my-3 text-sm font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border border-transparent rounded-md hover:bg-blue-600"
                target="_blank" rel="noreferrer noopener">
                Ver Temario Actual
            </a>
        </div>
        <x-button class="ml-4">
            {{ __('Guardar') }}
        </x-button>
    </section>
</form>