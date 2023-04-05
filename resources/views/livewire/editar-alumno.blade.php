<form action="" class="" wire:submit.prevent='editarAlumno'>

    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion Personal</h2>
    <!-- Nombre del alumno -->
    <div>
        <x-label for="student_name" value="{{ __('Nombre (es)') }}" />
        <x-input id="student_name" class="block w-full mt-1" type="text" wire:model="student_name" {{-- DEJAR WIRE  --}}
            :value="old('student_name')" />
    </div>

     <!-- apellido_paterno -->
     <div>
        <x-label for="paternal_surname" value="{{ __('Apellido paterno') }}" />
        <x-input id="paternal_surname" class="block w-full mt-1" type="text" wire:model="paternal_surnameS"
            :value="old('paternal_surname')" />
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="maternal_surname" value="{{ __('Apellido materno') }}" />
        <x-input id="maternal_surname" class="block w-full mt-1" type="text" wire:model="maternal_surnameS"
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
            <x-input id="gender" class="block w-full mt-1" type="text" wire:model="genderS" :value="old('gender')" />
        </div>

        <!-- email -->
    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block w-full mt-1" type="email" wire:model="emailS" :value="old('email')" />
    </div>

    <!-- telefono -->
    <div>
        <x-label for="phone" value="{{ __('Teléfono') }}" />
        <x-input id="phone" class="block w-full mt-1" type="tel" wire:model="phoneS" :value="old('phone')" />
    </div>

    <!-- Status 
    <div>
    <x-label for="status" value="{{ __('Estatus') }}" />
    <div class="mt-1" class="inline-flex items-center ml-6">
        <label for="status_true" >
            <input id="status_true" type="radio" class="form-radio" name="status" value="1" {{ $status ? 'checked' : '' }} wire:model="status">
            <span class="ml-2">{{ __('Activo') }}</span>
            <input id="status_false" type="radio" class="form-radio" name="status" value="0" {{ !$status ? 'checked' : '' }} wire:model="status">
            <span class="ml-2">{{ __('Inactivo') }}</span>
        </label>            
    </div> -->

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
<section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion Domicilio del Alumno</h2>
         
    <div class="p-2 border border-slate-200">
        <!-- calle-->
        <div>
            <x-label for="street" value="{{ __('Calle') }}" />
            <x-input id="street" class="block w-full mt-1" type="text" wire:model="streetS" :value="old('street')" />
        </div>

        <div>
            <div class="flex justify-between space-x-5">
                <!-- num_int-->
                <div class="block w-1/2">
                    <x-label for="num_int" value="{{ __('Número interior') }}" />
                    <x-input id="num_int" class="block w-full mt-1" type="text" wire:model="num_intS"
                        :value="old('num_int')" />
                </div>
                <!-- num_ext-->
                <div class="block w-1/2">
                    <x-label for="num_ext" value="{{ __('Número exterior') }}" />
                    <x-input id="num_ext" class="block w-full mt-1" type="text" wire:model="num_extS"
                        :value="old('num_ext')" />
                </div>
            </div>
        </div>

        <!-- colonia-->
        <div>
            <x-label for="neighborhood" value="{{ __('Colonia/Fraccionamiento') }}" />
            <x-input id="neighborhood" class="block w-full mt-1" type="text" wire:model="neighborhoodS"
                :value="old('neighborhood')" />
        </div>

        <!-- ciudad-->
        <div>
            <x-label for="city" value="{{ __('Ciudad') }}" />
            <x-input id="city" class="block w-full mt-1" type="text" wire:model="cityS" :value="old('city')" />
        </div>

        <!-- estado-->
        <div>
            <x-label for="state" value="{{ __('Estado') }}" />
            <x-input id="state" class="block w-full mt-1" type="text" wire:model="stateS" :value="old('state')" />
        </div>

        <!-- pais-->
        <div>
            <x-label for="country" value="{{ __('País') }}" />
            <x-input id="country" class="block w-full mt-1" type="text" wire:model="countryS" :value="old('country')" />
        </div>
    </div> <!-- finalDomicilio-->
    </section>


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
        <x-input id="document_name" class="block w-full mt-1" type="text" wire:model="document_name" {{-- DEJAR WIRE  --}}
            :value="old('document_name')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('document_name')"/>
        </div>
    </div>

         <!-- Status document-->
<div>
    <x-label for="status" value="{{ __('Estatus') }}" />
    <div class="mt-1" class="inline-flex items-center ml-6">
        <label for="status_true" >
            <input id="status_trueT" type="radio" class="form-radio" name="document_status" value="1" {{ $document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Activo') }}</span>
            <input id="status_falseT" type="radio" class="form-radio" name="document_status" value="0" {{ !$document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Inactivo') }}</span>
        </label>            
    </div>
</div>
         <!-- Archivo-->
    <div>
        <x-label for="file_new" value="{{ __('Seleccione el archivo (PDF)') }}" />
        <x-input id="file_new" class="block w-full mt-1" wire:model="file_new" type="file"
            accept=".pdf" />
    </div>
    <div>
            <a href="{{asset('storage/fileStudents/'.$file)}}" class="flex justify-center items-center px-4 py-2 my-3 text-sm font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border border-transparent rounded-md hover:bg-blue-600"
                target="_blank"
                rel="noreferrer noopener">
                Archivo Actual Alumno
            </a>
          </div>
    </div>
</section>


    <!-- Seccion Datos del Tutor -->
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Tutor</h2>
      
    <div class="p-2 border border-slate-200">
        <!-- Nombre del Tutor -->
    <div>
        <x-label for="tutor_name" value="{{ __('Nombre (es)') }}" />
        <x-input id="tutor_name" class="block w-full mt-1" type="text" wire:model="tutor_name"
            :value="old('tutor_name')" />
    </div>

    <!-- apellido_paterno -->
    <div>
        <x-label for="paternal_surnameT" value="{{ __('Apellido paterno') }}" />
        <x-input id="paternal_surnameT" class="block w-full mt-1" type="text" wire:model="paternal_surnameT"
            :value="old('paternal_surname')" />
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="maternal_surnameT" value="{{ __('Apellido materno') }}" />
        <x-input id="maternal_surnameT" class="block w-full mt-1" type="text" wire:model="maternal_surnameT"
            :value="old('maternal_surname')" />
    </div>

      <!-- Genero -->
      <div>
        <x-label for="genderT" value="{{ __('Genero') }}" />
        <x-input id="genderT" class="block w-full mt-1" type="text" wire:model="genderT" :value="old('gender')" />
    </div>

        <!-- email -->
    <div>
        <x-label for="emailT" value="{{ __('Email') }}" />
        <x-input id="emailT" class="block w-full mt-1" type="email" wire:model="emailT" :value="old('email')" />
    </div>

    <!-- telefono -->
    <div>
        <x-label for="phoneT" value="{{ __('Teléfono') }}" />
        <x-input id="phoneT" class="block w-full mt-1" type="tel" wire:model="phoneT" :value="old('phone')" />
    </div>
    </div> <!-- final Datos tutor-->

    <!-- Datos domicilio del tutor-->
    <div>
        <x-label class="text-lg font-bold" value="{{ __('Domicilio del Tutor') }}" />
    </div>
    <div class="p-2 border border-slate-200">
        <!-- calle-->
        <div>
            <x-label for="streetT" value="{{ __('Calle') }}" />
            <x-input id="streetT" class="block w-full mt-1" type="text" wire:model="streetT" :value="old('street')" />
        </div>

        <div>
            <div class="flex justify-between space-x-5">
                <!-- num_int-->
                <div class="block w-1/2">
                    <x-label for="num_intT" value="{{ __('Número interior') }}" />
                    <x-input id="num_intT" class="block w-full mt-1" type="text" wire:model="num_intT"
                        :value="old('num_int')" />
                </div>
                <!-- num_ext-->
                <div class="block w-1/2">
                    <x-label for="num_extT" value="{{ __('Número exterior') }}" />
                    <x-input id="num_extT" class="block w-full mt-1" type="text" wire:model="num_extT"
                        :value="old('num_ext')" />
                </div>
            </div>
        </div>

        <!-- colonia-->
        <div>
            <x-label for="neighborhoodT" value="{{ __('Colonia/Fraccionamiento') }}" />
            <x-input id="neighborhoodT" class="block w-full mt-1" type="text" wire:model="neighborhoodT"
                :value="old('neighborhood')" />
        </div>

        <!-- ciudad-->
        <div>
            <x-label for="cityT" value="{{ __('Ciudad') }}" />
            <x-input id="cityT" class="block w-full mt-1" type="text" wire:model="cityT" :value="old('city')" />
        </div>

        <!-- estado-->
        <div>
            <x-label for="stateT" value="{{ __('Estado') }}" />
            <x-input id="stateT" class="block w-full mt-1" type="text" wire:model="stateT" :value="old('state')" />
        </div>

        <!-- pais-->
        <div>
            <x-label for="countryT" value="{{ __('País') }}" />
            <x-input id="countryT" class="block w-full mt-1" type="text" wire:model="countryT" :value="old('country')" />
        </div>
    </div>
    </section>

    <x-button class="ml-4">
        {{ __('Guardar') }}
    </x-button>
    
</form>

