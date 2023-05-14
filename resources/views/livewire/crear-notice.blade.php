<form action="" class="" wire:submit.prevent='crearNotice'>
    
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Aviso</h2>
        {{-- Nombres --}}
         
        <div>
        <x-label for="title" value="{{ __('Titulo') }}" />
        <x-input id="title" class="block w-full mt-1" type="text" wire:model="title" {{-- DEJAR WIRE  --}}
            :value="old('title')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('title')"/>
        </div>
    </div>

    <div>
        <x-label for="description" value="{{ __('Descripcion') }}" />
        <x-input id="description" class="block w-full mt-1" type="text" wire:model="description" {{-- DEJAR WIRE  --}}
            :value="old('description')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('description')"/>
        </div>
    </div>

    <div>
        <x-label for="start_date" value="{{ __('Fecha de publicacion') }}" />
        <x-input id="start_date" class="block w-full mt-1" type="date" wire:model="start_date" {{-- DEJAR WIRE  --}}
            :value="old('start_date')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('start_date')"/>
        </div>
    </div>
    <div>
        <x-label for="end_date" value="{{ __('Fecha de Finalizacion') }}" />
        <x-input id="end_date" class="block w-full mt-1" type="date" wire:model="end_date" {{-- DEJAR WIRE  --}}
            :value="old('end_date')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('end_date')"/>
        </div>
    </div>
    <div>
        <x-label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="status" value="{{ __('Estado') }}" />
        <x-input id="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" wire:model="status" {{-- DEJAR WIRE  --}}
            :value="old('status')" />Activo
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('status')"/>
        </div>
    </div>

   {{--  <div>
        <x-label for="recipient" value="{{ __('Dirigido a') }}" />
        <x-input id="recipient" class="block w-full mt-1" type="text" wire:model="recipient"
            :value="old('recipient')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('recipient')"/>
        </div>
    </div> --}}
    <div>
        <x-label for="recipient" value="{{ __('Dirigido a') }}" />
        <select id="recipient" wire:model="recipient"
            class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
            <option value="">-- Seleccionar opcion --</option>
            <option value="alumno">Alumnos</option>
            <option value="docente">Docentes</option>
            <option value="ambos">Docentes y Alumnos</option>
        </select>

        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('recipient')" />
        </div>
    </div>
</section>
    
    <!-- fotografia-->
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Imagen del Aviso</h2>
         <div>
        <x-label for="photo" value="{{ __('Seleccione la imagen del aviso') }}" />
        <x-input id="photo" class="block w-full mt-1" wire:model="photo" type="file" accept="image/*" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('photo')"/>
        </div>
    </div>

    <x-button class="ml-4">
        {{ __('Guardar') }}
    </x-button>
    </section>
</form>