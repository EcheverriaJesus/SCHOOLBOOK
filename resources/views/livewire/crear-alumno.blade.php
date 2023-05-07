
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
        <x-input id="paternal_surname" class="block w-full mt-1" type="text" wire:model="paternal_surnameS"
            :value="old('paternal_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('paternal_surnameS')"/>
        </div>
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="maternal_surname" value="{{ __('Apellido materno') }}" />
        <x-input id="maternal_surname" class="block w-full mt-1" type="text" wire:model="maternal_surnameS"
            :value="old('maternal_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('maternal_surnameS')"/>
        </div>
    </div>

    <div>
            <div class="flex justify-between space-x-5">
                <!-- Grado del alumno-->
        <div>
            <x-label for="grade" value="{{ __('Grado') }}" />
            <select id="grade" wire:model="grade"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-Seleccionar Grado-</option>
                <option value="1">1°</option>
                <option value="2">2°</option>
                <option value="3">3°</option>
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('grade')" />
            </div>
        </div>
                <!-- Fecha de nacimiento-->
                <div class="block w-1/2">
                    <x-label for="birth_date" value="{{ __('Fecha de Nacimiento') }}" />
                    <x-input id="birth_date" class="block w-full mt-1" type="date" wire:model="birth_date"
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
            <select id="gender" wire:model="genderS"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Genero--</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('genderS')" />
            </div>
        </div>
        

        <!-- email -->
    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block w-full mt-1" type="email" wire:model="emailS" :value="old('email')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('emailS')"/>
        </div>
    </div>

    <!-- telefono -->
    <div>
        <x-label for="phone" value="{{ __('Teléfono') }}" />
        <x-input id="phone" class="block w-full mt-1" type="tel" wire:model="phoneS" :value="old('phone')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('phoneS')"/>
        </div>
    </div>

    <!-- status alumno -->
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
            <x-input id="street" class="block w-full mt-1" type="text" wire:model="streetS" :value="old('street')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('streetS')"/>
            </div>
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
            <div class="block space-x-2">
                <x-alert-danger :messages="$errors->get('num_intS')" />
                <x-alert-danger :messages="$errors->get('num_extS')" />
            </div>
        </div>

        <!-- colonia-->
        <div>
            <x-label for="neighborhood" value="{{ __('Colonia/Fraccionamiento') }}" />
            <x-input id="neighborhood" class="block w-full mt-1" type="text" wire:model="neighborhoodS"
                :value="old('neighborhood')" />
            
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('neighborhoodS')"/>
            </div>
        </div>

        <!-- ciudad-->
        <div>
            <x-label for="city" value="{{ __('Ciudad') }}" />
            <x-input id="city" class="block w-full mt-1" type="text" wire:model="cityS" :value="old('city')" />
            
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('cityS')"/>
            </div>
        </div>

        <!-- estado-->
        <div>
            <x-label for="state" value="{{ __('Estado') }}" />
            <x-input id="state" class="block w-full mt-1" type="text" wire:model="stateS" :value="old('state')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('stateS')"/>
            </div>
        </div>

        <!-- pais-->
        <div>
            <x-label for="country" value="{{ __('País') }}" />
            <x-input id="country" class="block w-full mt-1" type="text" wire:model="countryS" :value="old('country')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('countryS')"/>
            </div>
        </div>

    </div> <!-- finalDomicilio-->
    </section>


         <!-- Seccion Documentos -->
  <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Documentos del Alumno </h2>
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
            <input id="status_trueT" type="radio" class="form-radio" name="document_status" value="1" {{ $document_status ? 'checked' : '' }} wire:model="document_status">
            <span class="ml-2">{{ __('Activo') }}</span>
            <input id="status_falseT" type="radio" class="form-radio" name="document_status" value="0" {{ !$document_status ? 'checked' : '' }} wire:model="document_status">
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


    <!-- Seccion Datos del Tutor -->
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Tutor</h2>
      
    <div class="p-2 border border-slate-200">
        <!-- Nombre del Tutor -->
    <div>
        <x-label for="tutor_name" value="{{ __('Nombre (es)') }}" />
        <x-input id="tutor_name" class="block w-full mt-1" type="text" wire:model="tutor_name"
            :value="old('tutor_name')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('tutor_name')"/>
        </div>
    </div>

    <!-- apellido_paterno -->
    <div>
        <x-label for="paternal_surnameT" value="{{ __('Apellido paterno') }}" />
        <x-input id="paternal_surnameT" class="block w-full mt-1" type="text" wire:model="paternal_surnameT"
            :value="old('paternal_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('paternal_surnameT')"/>
        </div>
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="maternal_surnameT" value="{{ __('Apellido materno') }}" />
        <x-input id="maternal_surnameT" class="block w-full mt-1" type="text" wire:model="maternal_surnameT"
            :value="old('maternal_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('maternal_surnameT')"/>
        </div>
    </div>

      <!-- Genero -->
    <div>
            <x-label for="genderT" value="{{ __('Genero') }}" />
            <select id="genderT" wire:model="genderT"
                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                <option value="">-- Genero--</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>

            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('genderT')" />
            </div>
        </div>

        <!-- email -->
    <div>
        <x-label for="emailT" value="{{ __('Email') }}" />
        <x-input id="emailT" class="block w-full mt-1" type="email" wire:model="emailT" :value="old('email')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('emailT')"/>
        </div>
    </div>

    <!-- telefono -->
    <div>
        <x-label for="phoneT" value="{{ __('Teléfono') }}" />
        <x-input id="phoneT" class="block w-full mt-1" type="tel" wire:model="phoneT" :value="old('phone')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('phoneT')"/>
        </div>
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
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('streetT')"/>
            </div>
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
            <div class="block space-x-2">
                <x-alert-danger :messages="$errors->get('num_intT')" />
                <x-alert-danger :messages="$errors->get('num_extT')" />
            </div>
        </div>

        <!-- colonia-->
        <div>
            <x-label for="neighborhoodT" value="{{ __('Colonia/Fraccionamiento') }}" />
            <x-input id="neighborhoodT" class="block w-full mt-1" type="text" wire:model="neighborhoodT"
                :value="old('neighborhood')" />
            
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('neighborhoodT')"/>
            </div>
        </div>

        <!-- ciudad-->
        <div>
            <x-label for="cityT" value="{{ __('Ciudad') }}" />
            <x-input id="cityT" class="block w-full mt-1" type="text" wire:model="cityT" :value="old('city')" />
            
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('cityT')"/>
            </div>
        </div>

        <!-- estado-->
        <div>
            <x-label for="stateT" value="{{ __('Estado') }}" />
            <x-input id="stateT" class="block w-full mt-1" type="text" wire:model="stateT" :value="old('state')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('stateT')"/>
            </div>
        </div>

        <!-- pais-->
        <div>
            <x-label for="countryT" value="{{ __('País') }}" />
            <x-input id="countryT" class="block w-full mt-1" type="text" wire:model="countryT" :value="old('country')" />
            <div class="block mt-2">
                <x-alert-danger :messages="$errors->get('countryT')"/>
            </div>
        </div>
    </div>
    </section>

    <x-button class="ml-4">
        {{ __('Guardar') }}
    </x-button>
    

    
</form>
