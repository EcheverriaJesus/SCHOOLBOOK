<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CrearNotice extends Component
{
//atributos
public $title;
public $description;
public $start_date;
public $end_date;
public $status;
public $recipient;
public $photo;

use WithFileUploads;

protected $rules = [
    'title' => 'required|string|max:100',
    'description' => 'required|string|max:255',
    'start_date' => 'required|date',
    'end_date' => 'required|date',
    'status' => 'required|boolean',
    'recipient' => 'required|string|max:50',
    'photo' => 'required|image|max:1024',
 
];

public function crearNotice(){
    //Validar
    $datos = $this->validate();
    //Almacenamos imagen del aviso
    $nombreOriginal = $this->photo->getClientOriginalName();
    $this->photo->storeAs('public/imageNotice', $nombreOriginal);
    $datos['photo'] = $nombreOriginal;

    //Se gurda registro de Noticia
    Notice::create([
        'title' => $datos['title'],
        'description' => $datos['description'],
        'start_date' => $datos['start_date'],
        'end_date' => $datos['end_date'],
        'status' => $datos['status'],
        'recipient' => $datos['recipient'],
        'image' => $datos['photo'],
    ]);
    session()->flash('mensaje','Se registro la noticia correctamente');
    return redirect()->route('dashboard');
}

    public function render()
    {
        return view('livewire.crear-notice');
    }
}