@php
$notices = App\Models\Notice::all();
$noticesCount = count($notices);
@endphp

<div>
    {{-- Boton asignar --}}
<div class="flex justify-end">
    <a href="{{route('notices.create')}}"
        class="flex items-center px-4 py-2 font-semibold tracking-widest text-white transition duration-150 ease-in-out bg-blue-700 border rounded-md tet-sm border-transparet hover:bg-blue-600">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <label class="ml-1 text-sm">Agregar Aviso</label>
    </a>
</div>

<!-- Slider -->
<div class="mb-4 relative w-full" data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         {{-- Imagenes --}}
         @foreach ($notices as $notice)
         <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" 
            src="{{ asset('storage/imageNotice/' . $notice->image) }}"
            alt="{{ 'Imagen aviso ' . $notice->title }}">
        </div>
@endforeach
    </div>

    <!-- Botones -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        @for ($i = 0; $i < $noticesCount; $i++)
             <button type="button" class="w-4 h-4 rounded-full" 
             aria-current={{ $i == 0 ? 'true' : 'false' }} aria-label="Slide {{ $i + 1 }}" 
             data-carousel-slide-to="{{ $i }}"></button>
        @endfor
    </div>

    <!--Boton para regresar imagen en el slider -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Anterior</span>
        </span>
    </button>
    <!--Boton para avanzar imagen en el slider -->
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Siguiente</span>
        </span>
    </button>
</div>

{{-- Targetas para los avisos --}}
@foreach ($notices as $notice)

{{-- Imagen --}}
   <div class="bg-white w-auto sm:bg-white w-full h-auto shadow-2xl rounded-xl mb-10 p-6 space-y-6 border">
     <img class="w-full rounded-lg" src="{{ asset('storage/imageNotice/' . $notice->image) }}"alt="{{ 'Imagen aviso ' . $notice->title }}">
     
     {{-- Titulo --}}
     <div class="flex flex-col items-center">
         <h2 class="mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $notice->title }}</h2>
         {{-- Descripcion --}}
         <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $notice->description }}</p>
     </div>
<div>
 <div class="flex flex-col">
        <p class="font-semibold">Fecha de Publicacion: </p>
        <p class="text-slate-400 font-normal tracking-wider">{{ $notice->start_date }}</p>
    </div>
    <div class="flex flex-col">
        <p class="font-semibold">Dirijido a: </p>
        <p class="text-slate-400 font-normal tracking-wider">{{ $notice->recipient }}</p>
    </div>
</div>
   </div>
   @endforeach
</div>
