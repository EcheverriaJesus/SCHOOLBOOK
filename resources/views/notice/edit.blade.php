{{--
    @extends('layouts.app')

    @section('content')
        notice.edit template
    @endsection
--}}
<x-app-layout>
    <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
     @if (session()->has('mensaje'))
     <x-alert-success :message="session('mensaje')" class="mt-2" />
   @endif
   <livewire:editar-notice />
    </div>
 </div>
 </x-app-layout>