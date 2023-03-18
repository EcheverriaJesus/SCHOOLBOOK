<form action="" class="space-y-5 md:w-1/2" wire:submit.prevent='crearProfesor'>
    
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion Personal</h2>
         <div>
        <x-label for="first_name" value="{{ __('Nombre (es)') }}" />
        <x-input id="first_name" class="block w-full mt-1" type="text" wire:model="first_name" {{-- DEJAR WIRE  --}}
            :value="old('first_name')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('first_name')"/>
        </div>
    </div>

    <!-- apellido_paterno -->
    <div>
        <x-label for="father_surname" value="{{ __('Apellido paterno') }}" />
        <x-input id="father_surname" class="block w-full mt-1" type="text" wire:model="father_surname"
            :value="old('father_surname')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('father_surname')"/>
        </div>
    </div>

    <!-- apellido_materno-->
    <div>
        <x-label for="fathers_last_name" value="{{ __('Apellido materno') }}" />
        <x-input id="fathers_last_name" class="block w-full mt-1" type="text" wire:model="fathers_last_name"
            :value="old('fathers_last_name')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('fathers_last_name')"/>
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

    <!-- email -->
    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block w-full mt-1" type="email" wire:model="email" :value="old('email')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('email')"/>
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

    <!-- RFC -->
    <div>
        <x-label for="rfc" value="{{ __('RFC') }}" />
        <x-input id="rfc" class="block w-full mt-1" type="text" wire:model="rfc" :value="old('rfc')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('rfc')"/>
        </div>
    </div>
    </section>
    <!-- nombre -->
   


<section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion de Estudios</h2>
         
     <!-- Nivel de estudios -->
    <div>
        <x-label for="education_level" value="{{ __('Nivel de estudios') }}" />
        <select id="education_level" wire:model="education_level" class="block w-full mt-1 border-gray-300">
            <option value="">-- Seleccione --</option>
            <option value="licenciatura">Licenciatura</option>
            <option value="maestría">Maestría</option>
            <option value="doctorado">Doctorado</option>
        </select>
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('education_level')"/>
        </div>
    </div>

    <!-- especialidad -->
    <div>
        <x-label for="major" value="{{ __('Especialidad') }}" />
        <x-input id="major" class="block w-full mt-1" type="text" wire:model="major" :value="old('major')" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('major')"/>
        </div>
    </div>
</section>

   
<!-- domicilio -->
<section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
    <h2 class="flex justify-center text-xl font-bold text-indigo-600">Informacion del Domicilio</h2>
         
    <div>
        <x-label class="text-lg font-bold" for="especialidad" value="{{ __('Domicilio') }}" />
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

    

    <!-- fotografia-->
    <section class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
        <h2 class="flex justify-center text-xl font-bold text-indigo-600">Mas Informacion</h2>
         <div>
        <x-label for="photo" value="{{ __('Seleccione la fotografia del docente') }}" />
        <x-input id="photo" class="block w-full mt-1" wire:model="photo" type="file" accept="image/*" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('photo')"/>
        </div>
    </div>

    <!-- Cedula profesional-->
    <div>
        <x-label for="professional_license" value="{{ __('Seleccione la cedula profesional del docente (PDF)') }}" />
        <x-input id="professional_license" class="block w-full mt-1" wire:model="professional_license" type="file"
            accept=".pdf" />
        <div class="block mt-2">
            <x-alert-danger :messages="$errors->get('professional_license')" />
        </div>
    </div>

    <x-button class="ml-4">
        {{ __('Guardar') }}
    </x-button>
    </section>
   

</form>