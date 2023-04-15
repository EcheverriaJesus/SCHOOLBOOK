<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditarNotice extends Component
{

//atributos

public $notice_id;
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
    'photo_new' => 'nullable|image|max:1024',
];
    public function mount(Notice $notice){
        $this->notice_id = $notice->id;
        $this->title = $notice->title;
        $this->description = $notice->description;
        $this->start_date = $notice->start_date;
        $this->end_date = $notice->end_date;
        $this->status = $notice->status;
        $this->recipient = $notice->recipient;
        $this->photo = $notice->image;
    } 

    public function editarAviso(){
//Validar campos
$datos = $this->validate();
//Encontrar la noticia a editar (objeto ORM)
$notice = Notice::find($this->notice_id);
 //Hay una imagen nueva ??
 if($this->photo_new){
    //Se guarda la imagen y se obtiene la ruta
    $image = $this->photo_new->store('public/imageNotice');
    //Cortamos la ruta de la imagen para almacenar unicamente el nombre de la imagen
    $datos['image'] = str_replace('public/imageNotice/','',$image);
    //Eliminamos imagen vieja
    Storage::delete('public/imageNotice/'.$notice->image);
}
//Asignar los valores a la noticia
$notice->title = $datos['title'];
$notice->description = $datos['description'];
$notice->start_date = $datos['start_date'];
$notice->end_date = $datos['end_date'];
$notice->status = $datos['status'];
$notice->recipient = $datos['recipient'];
$notice->image = $datos['image'] ?? $notice->image;
$notice->save();
$this->emitTo('MostrarNotice','updateNotice');
session()->flash('mensaje','Los datos del aviso se actualizarón correctamente');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.editar-notice');
    }


}
