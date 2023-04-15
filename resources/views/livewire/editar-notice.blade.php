<form action="" class="" wire:submit.prevent='editarAviso'>

    {{-- Informacion Personal --}}
        <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
            <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Aviso</h2>
            <x-validation-errors class="mb-4" />
            <!-- nombre -->
            <div>
                <x-label for="title" value="{{ __('Titulo') }}" />
                <x-input id="title" class="block w-full mt-1" type="text" wire:model="title"
                    :value="old('title')" />
            </div>
            {{-- Descripcion --}}
            <div>
                <x-label for="description" value="{{ __('Descripcion') }}" />
                <x-input id="description" class="block w-full mt-1" type="text" wire:model="description"
                    :value="old('description')" />
            </div>
            {{-- Fecha de publicacion --}}
            <div>
                <x-label for="start_date" value="{{ __('Fecha de inicio') }}" />
                <x-input id="start_date" class="block w-full mt-1" type="text" wire:model="start_date"
                    :value="old('start_date')" />
            </div>
            {{-- Fecha de finalizacion --}}
            <div>
                <x-label for="end_date" value="{{ __('Fecha de finalizacion') }}" />
                <x-input id="end_date" class="block w-full mt-1" type="text" wire:model="end_date"
                    :value="old('end_date')" />
            </div>
            {{-- Status --}}
            <div>
                <x-label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="status" value="{{ __('Estado') }}" />
                <x-input id="status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" wire:model="status"
                    :value="old('status')" />Activo
            </div>
            {{-- recipient --}}
            <div>
                <x-label for="recipient" value="{{ __('Dirigido a') }}" />
                <x-input id="recipient" class="block w-full mt-1" type="text" wire:model="recipient"
                    :value="old('recipient')" />
            </div>

            {{-- Foto --}}
            <div     class="flex pb-4">
                <div class="block my-5 w-80 h-auto">
                    <x-label :value="__('Fotografia actual')" class="my-2"/>
                    <img src="{{asset('storage/imageNotice/'.$photo)}}" alt="{{'Imagen del Aviso'}}">
                </div>
                <div class="block my-5 w-80 h-auto">
                    @if ($photo_new)
                    <x-label :value="__('Fotografia nueva')" class="my-2"/>
                    <img src="{{$photo_new->temporaryUrl()}}">
                    @endif
                </div>
            </div>
            
                <div class="">
                    <x-label for="photo_new" :value="__('Seleccione la fotografia del Aviso')" />
                    <x-input wire:model="photo_new" id="photo_new" class="block w-full mt-1" type="file" accept="image/*" />
                  
                </div>
         <div>
            <x-button class="ml-4">
                {{ __('Guardar') }}
            </x-button>
         </div>
    </section>
    </form>