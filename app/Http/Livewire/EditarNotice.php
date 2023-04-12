<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditarNotice extends Component
{

//atributos
public $title;
public $description;
public $start_date;
public $end_date;
public $status;
public $recipient;
public $photo;
public $photo_new;

//importar clase de subida de archivos
use WithFileUploads;

protected $rules = [
    'title' => 'required|string|max:100',
    'description' => 'required|string|max:255',
    'start_date' => 'required|date',
    'end_date' => 'required|date',
    'status' => 'required|boolean',
    'recipient' => 'required|string|max:50',
    'photo' => 'required|image|max:1024',
    'photo_new' => 'nullable|image|max:1024',
];
    
    public function render()
    {
        return view('livewire.editar-notice');
    }
}
