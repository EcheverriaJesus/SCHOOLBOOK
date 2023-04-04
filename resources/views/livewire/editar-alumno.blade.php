<form action="" class="" wire:submit.prevent='editarAlumno'>

{{-- Informacion Personal --}}
<section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion Personal</h2>
        <x-validation-errors class="mb-4" />
        <!-- Nombre del alumno -->
    <div>
        <x-label for="student_name" value="{{ __('Nombre (es)') }}" />
        <x-input id="student_name" class="block w-full mt-1" type="text" wire:model="student_name"
            :value="old('student_name')" />
    </div>
     <!-- apellido_paterno -->
     <div>
        <x-label for="paternal_surname" value="{{ __('Apellido paterno') }}" />
        <x-input id="paternal_surname" class="block w-full mt-1" type="text" wire:model="paternal_surname"
            :value="old('paternal_surname')" />
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="maternal_surname" value="{{ __('Apellido materno') }}" />
        <x-input id="maternal_surname" class="block w-full mt-1" type="text" wire:model="maternal_surname"
            :value="old('maternal_surname')" />
    </div>

    <div>
            <div class="flex justify-between space-x-5">
                <!-- Grado del alumno-->
                <div class="block w-1/2">
                    <x-label for="grade" value="{{ __('Grado') }}" />
                    <x-input id="grade" class="block w-full mt-1" type="text" wire:model="grade"
                        :value="old('grade')" />
                </div>
                <!-- Fecha de nacimiento-->
                <div class="block w-1/2">
                    <x-label for="birth_date" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-input id="birth_date" class="block w-full mt-1" type="text" wire:model="birth_date"
                        :value="old('birth_date')" />
                </div>
            </div>
        </div>

        <!-- CURP -->
        <div>
            <x-label for="curp" value="{{ __('CURP') }}" />
            <x-input id="curp" class="block w-full mt-1" type="text" wire:model="curp" :value="old('curp')" />
        </div>

        <!-- Genero -->
        <div>
            <x-label for="gender" value="{{ __('Genero') }}" />
            <x-input id="gender" class="block w-full mt-1" type="text" wire:model="gender" :value="old('gender')" />
        </div>

        <!-- email -->
    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block w-full mt-1" type="email" wire:model="email" :value="old('email')" />
    </div>

    <!-- telefono -->
    <div>
        <x-label for="phone" value="{{ __('Teléfono') }}" />
        <x-input id="phone" class="block w-full mt-1" type="tel" wire:model="phone" :value="old('phone')" />
    </div>

    <!-- Status -->
    <div>
    <x-label for="status" value="{{ __('Estatus') }}" />
    <div class="mt-1" class="inline-flex items-center ml-6">
        <label for="status_true" >
            <input id="status_true" type="radio" class="form-radio" name="student_status" value="1" {{ $student_status ? 'checked' : '' }} wire:model="student_status">
            <span class="ml-2">{{ __('Activo') }}</span>
            <input id="status_false" type="radio" class="form-radio" name="student_status" value="0" {{ !$student_status ? 'checked' : '' }} wire:model="student_status">
            <span class="ml-2">{{ __('Inactivo') }}</span>
        </label>            
    </div>
    
    <!-- Plan de estudios  -->
    <div>
        <x-label for="study_plan" value="{{ __('Plan de estudios') }}" />
        <x-input id="study_plan" class="block w-full mt-1" type="text" wire:model="study_plan" :value="old('study_plan')" />
    </div>
    </section>
    
   <!-- Fotografia -->
   <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10 p-4 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Mas Informacion</h2>
        <div class="flex pb-4">
            <div class="block my-5 w-80 h-auto">
                <x-label :value="__('Fotografia actual')" class="my-2"/>
                <img src="{{asset('storage/imageStudents/'.$photo)}}" alt="{{'Imagen Alumno '}}">
            </div>
            <div class="block my-5 w-80 h-auto">
                @if ($photo_new)
                <x-label :value="__('Fotografia nueva')" class="my-2"/>
                <img src="{{$photo_new->temporaryUrl()}}">
                @endif
            </div>
        </div>
            <div class="">
                <x-label for="photo_new" :value="__('Seleccione la fotografia del Alumno')" />
                <x-input wire:model="photo_new" id="photo_new" class="block w-full mt-1" type="file" accept="image/*" />
            </div>
    </section>


    <!-- domicilio -->
    <div class="bg-white w-auto sm:bg-white w-full h-auto shadow-xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Domicilio</h2>
       
            <!-- calle-->
            <div>
                <x-label for="street" value="{{ __('Calle') }}" />
                <x-input id="street" class="block w-full mt-1" type="text" wire:model="street" :value="old('street')" />
            </div>
        
            <div class="flex justify-between space-x-5">
                <!-- num_int-->
                <div class="block w-1/2">
                    <x-label for="num_int" value="{{ __('Número interior') }}" />
                    <x-input id="num_int" class="block w-full mt-1" type="text" wire:model="num_int"
                        :value="old('num_int')" />
                </div>
                <!-- num_ext-->
                <div class="block w-1/2">
                    <x-label for="num_ext" value="{{ __('Número exterior') }}" />
                    <x-input id="num_ext" class="block w-full mt-1" type="text" wire:model="num_ext"
                        :value="old('num_ext')" />
                </div>
            </div>
        
            <!-- colonia-->
            <div>
                <x-label for="neighborhood" value="{{ __('Colonia/Fraccionamiento') }}" />
                <x-input id="neighborhood" class="block w-full mt-1" type="text" wire:model="neighborhood"
                    :value="old('neighborhood')" />
            </div>
        
            <!-- ciudad-->
            <div>
                <x-label for="city" value="{{ __('Ciudad') }}" />
                <x-input id="city" class="block w-full mt-1" type="text" wire:model="city" :value="old('city')" />
            </div>
        
            <!-- estado-->
            <div>
                <x-label for="state" value="{{ __('Estado') }}" />
                <x-input id="state" class="block w-full mt-1" type="text" wire:model="state" :value="old('state')" />
            </div>
        
            <!-- pais-->
            <div>
                <x-label for="country" value="{{ __('País') }}" />
                <x-input id="country" class="block w-full mt-1" type="text" wire:model="country" :value="old('country')" />
            </div>
        
       <!-- finalDomicilio-->

        <!-- Seccion Documentos -->
  <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Documentos </h2>
         
    <div>
        <x-label class="text-lg font-bold" for="especialidad" value="{{ __('Documentos del Alumno') }}" />
    </div>
    <div class="p-2 border border-slate-200">
        <!-- Nombre del Documento -->
    <div>
        <x-label for="document_name" value="{{ __('Nombre del Documento') }}" />
        <x-input id="document_name" class="block w-full mt-1" type="text" wire:model="document_name"
            :value="old('document_name')" />
    </div>

         <!-- Status document-->
<div>
    <x-label for="status" value="{{ __('Estatus') }}" />
    <div class="mt-1" class="inline-flex items-center ml-6">
        <label for="status_true">
            <input id="status_true" type="radio" class="form-radio" name="document_status" value="1" {{ $document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Activo') }}</span>
            <input id="status_false" type="radio" class="form-radio" name="document_status" value="0" {{ !$document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Inactivo') }}</span>
        </label>            
    </div>
</div>


         <!-- Archivo-->
    <div>
        <x-label for="file" value="{{ __('Seleccione el archivo (PDF)') }}" />
        <x-input id="file" class="block w-full mt-1" wire:model="file" type="file"
            accept=".pdf" />
    </div>
    </div>
</section>
    <x-button class="ml-4">
        {{ __('Guardar') }}
    </x-button>
    </section>
</form>
