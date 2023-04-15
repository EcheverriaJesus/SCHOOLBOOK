<form class="space-y-5 md:w-full" wire:submit.prevent='crearGrupo'>

    <section class="grid w-full h-auto p-6 mb-10 bg-white border shadow-2xl md:gap-4 md:grid-cols-2 sm:bg-white rounded-xl">

        <div class="w-full">
            <x-label for="materia" value="{{ __('Materia') }}" />
            <select id="materia" wire:model="materia"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione la materia --</option>
                
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('materia')" />
            </div>
        </div>

        <div class="w-full">
            <x-label for="ciclo" value="{{ __('Ciclo escolar') }}" />
            <select id="ciclo" wire:model="ciclo"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el Ciclo Escolar --</option>
                
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('ciclo')" />
            </div>
        </div>

        <div class="w-full">
            <x-label for="aula" value="{{ __('Aula') }}" />
            <select id="aula" wire:model="ciclo"
                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Seleccione el Aula --</option>
            </select>
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('grado')" />
            </div>
        </div>

        
        
    </section>
</form>
