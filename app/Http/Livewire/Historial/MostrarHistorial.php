<?php

namespace App\Http\Livewire\Historial;

use Livewire\Component;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;

class MostrarHistorial extends Component
{
    public function render()
    {
        $subjects = Subject::all();
        return view('livewire.historial.mostrar-historial', compact('subjects'));
    }
}
