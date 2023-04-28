<x-app-layout>
@if (session('info'))
<div class="">
<strong>{{ session('info') }}</strong>
</div>
    
@endif
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
              <x-alert-success :message="session('mensaje')" class="mt-2" />
            @endif
            <livewire:usuario.editar-usuario />
            {{-- Esto va en el livewire --}}
            <section  class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
                <x-button_back>
                    <x-slot name="route"> {{route('user.index')}} </x-slot>
                     {{ __('user.index') }}
                   </x-button_back>
                <div class="flex justify-center gap-3">
                    <h2 class="flex justify-center text-xl font-bold text-indigo-800">Asignar un rol al usuario:</h2>
                    <p class="flex justify-center text-xl font-bold text-indigo-600">{{$user->name }}</p>
                </div>
                <h3 class="text-xl font-bold">Lista de los roles</h3>
<form class="flex flex-col items-center" method="POST" action="{{ route('user.update', $user) }}">
    @csrf
    @method('PUT')
    @foreach ($roles as $role)
        <ul class="mt-3 w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
           <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <div class="flex items-center pl-3">
              <label class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                  <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                  {{ $role->name }}
              </label>
            </div>
           </li>
        </ul>
    @endforeach
    <div class="flex justify-center mt-10">
        <button class="items-center px-4 py-2 font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border rounded-md tet-sm border-transparet hover:bg-blue-600" type="submit">Guardar</button>
    </div>
</form>
            </section>
        </div>
    </div>
</x-app-layout>