
<form action="" class="space-y-5 md:w-1/2" wire:submit.prevent='crearAlumno'>
    
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion Personal</h2>
    <!-- Nombre del alumno -->
    <div>
        <x-label for="student_name" value="{{ __('Nombre (es)') }}" />
        <x-input id="student_name" class="block w-full mt-1" type="text" wire:model="student_name" {{-- DEJAR WIRE  --}}
            :value="old('student_name')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('student_name')"/>
        </div>
    </div>

     <!-- apellido_paterno -->
     <div>
        <x-label for="paternal_surname" value="{{ __('Apellido paterno') }}" />
        <x-input id="paternal_surname" class="block w-full mt-1" type="text" wire:model="paternal_surname"
            :value="old('paternal_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('paternal_surname')"/>
        </div>
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="maternal_surname" value="{{ __('Apellido materno') }}" />
        <x-input id="maternal_surname" class="block w-full mt-1" type="text" wire:model="maternal_surname"
            :value="old('maternal_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('maternal_surname')"/>
        </div>
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
            <div class="block space-x-2">
                <x-alert-danger :messages="$errors->get('grade')" />
                <x-alert-danger :messages="$errors->get('birth_date')" />
            </div>
        </div>

        <!-- CURP -->
        <div>
            <x-label for="curp" value="{{ __('CURP') }}" />
            <x-input id="curp" class="block w-full mt-1" type="text" wire:model="curp" :value="old('curp')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('curp')"/>
            </div>
        </div>

        <!-- Genero -->
        <div>
            <x-label for="gender" value="{{ __('Genero') }}" />
            <x-input id="gender" class="block w-full mt-1" type="text" wire:model="gender" :value="old('gender')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('gender')"/>
            </div>
        </div>

        <!-- email -->
    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block w-full mt-1" type="email" wire:model="email" :value="old('email')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('email')"/>
        </div>
    </div>

    <!-- telefono -->
    <div>
        <x-label for="phone" value="{{ __('Teléfono') }}" />
        <x-input id="phone" class="block w-full mt-1" type="tel" wire:model="phone" :value="old('phone')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('phone')"/>
        </div>
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
    <div class="block mt-2">
        <x-alert-danger :messages="$errors->get('student_status')"/>
   </div>
</div>


    
    <!-- Plan de estudios  -->
    <div>
        <x-label for="study_plan" value="{{ __('Plan de estudios') }}" />
        <x-input id="study_plan" class="block w-full mt-1" type="text" wire:model="study_plan" :value="old('study_plan')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('study_plan')"/>
       </div>
    </div>
    </section>
    
    <!-- fotografia-->
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Mas Informacion</h2>
         <div>
        <x-label for="photo" value="{{ __('Seleccione la fotografia del Alumno') }}" />
        <x-input id="photo" class="block w-full mt-1" wire:model="photo" type="file" accept="image/*" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('photo')"/>
        </div>
    </div>
    </section>

    <!-- domicilio -->
<section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Domicilio</h2>
         
    <div>
        <x-label class="text-lg font-bold" for="especialidad" value="{{ __('Domicilio del Alumno') }}" />
    </div>
    <div class="p-2 border border-slate-200">
        <!-- calle-->
        <div>
            <x-label for="street" value="{{ __('Calle') }}" />
            <x-input id="street" class="block w-full mt-1" type="text" wire:model="street" :value="old('street')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('street')"/>
            </div>
        </div>

        <div>
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
            <div class="block space-x-2">
                <x-alert-danger :messages="$errors->get('num_int')" />
                <x-alert-danger :messages="$errors->get('num_ext')" />
            </div>
        </div>

        <!-- colonia-->
        <div>
            <x-label for="neighborhood" value="{{ __('Colonia/Fraccionamiento') }}" />
            <x-input id="neighborhood" class="block w-full mt-1" type="text" wire:model="neighborhood"
                :value="old('neighborhood')" />
            
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('neighborhood')"/>
            </div>
        </div>

        <!-- ciudad-->
        <div>
            <x-label for="city" value="{{ __('Ciudad') }}" />
            <x-input id="city" class="block w-full mt-1" type="text" wire:model="city" :value="old('city')" />
            
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('city')"/>
            </div>
        </div>

        <!-- estado-->
        <div>
            <x-label for="state" value="{{ __('Estado') }}" />
            <x-input id="state" class="block w-full mt-1" type="text" wire:model="state" :value="old('state')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('state')"/>
            </div>
        </div>

        <!-- pais-->
        <div>
            <x-label for="country" value="{{ __('País') }}" />
            <x-input id="country" class="block w-full mt-1" type="text" wire:model="country" :value="old('country')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('country')"/>
            </div>
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
        <x-input id="document_name" class="block w-full mt-1" type="text" wire:model="document_name"
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
            <input id="status_true" type="radio" class="form-radio" name="document_status" value="1" {{ $document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Activo') }}</span>
            <input id="status_false" type="radio" class="form-radio" name="document_status" value="0" {{ !$document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Inactivo') }}</span>
        </label>            
    </div>
    <div class="block mt-2">
        <x-alert-danger :messages="$errors->get('document_status')"/>
   </div>
</div>



         <!-- Archivo-->
    <div>
        <x-label for="file" value="{{ __('Seleccione el archivo (PDF)') }}" />
        <x-input id="file" class="block w-full mt-1" wire:model="file" type="file"
            accept=".pdf" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('file')" />
        </div>
    </div>
    </div>
</section>



    <x-button class="ml-4">
        {{ __('Guardar') }}
    </x-button>
    </section>
   

</form>
