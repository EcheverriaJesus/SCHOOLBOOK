@php
$notices = App\Models\Notice::all();
$noticesCount = count($notices);
@endphp

<div>
    {{-- Boton asignar --}}

    @role('admin')
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
    @endrole
    
<!-- Slider -->
<div class="relative w-full mb-4" data-carousel="slide">
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
   <div class="w-auto w-full h-auto p-6 mb-10 space-y-6 bg-white border shadow-2xl sm:bg-white rounded-xl">
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
        <p class="font-normal tracking-wider text-slate-400">{{ $notice->start_date }}</p>
    </div>
    <div class="flex flex-col">
        <p class="font-semibold">Dirijido a: </p>
        <p class="font-normal tracking-wider text-slate-400">{{ $notice->recipient }}</p>
    </div>
</div>

@role('admin|coordinador')
<div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0 md:flex-row">
    {{-- Boton modificar --}}
   <a href="{{route('notices.edit',$notice->id)}}"
       class="flex justify-center gap-2 px-4 py-2 text-xs font-bold text-white uppercase bg-green-600 rounded-lg">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
           stroke="currentColor" class="w-6 h-6">
           <path stroke-linecap="round" stroke-linejoin="round"
               d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
       </svg>
   </a>
   {{-- Boton eliminar --}}
   <button wire:click="$emit('mostrarAlerta', {{$notice->id}})"
    class="flex justify-center gap-2 px-2 py-2 text-xs font-bold text-white uppercase bg-red-600 rounded-lg">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
    </svg>
</button>
</div>
@endrole
   </div>
   @endforeach
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('mostrarAlerta', (noticeId) => {
    Swal.fire({
        title: '¿Eliminar Aviso?',
        text: "Un Aviso Eliminado ya no se podrá recuperar.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡Eliminar!',
        cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    //Eliminar profesor desde servidor (Emitir evento hacia el componente)
    Livewire.emit('deleteNotice',noticeId)
    Swal.fire(
      'Se Eliminó el Aviso',
      'Eliminado Correctamente',
      'success'
    )
  }
})
})
</script>
@endpush