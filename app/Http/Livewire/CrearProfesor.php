<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class CrearProfesor extends Component
{
    //atributos
    public $first_name;
    public $father_surname;
    public $fathers_last_name;
    public $phone;
    public $email;
    public $curp;
    public $rfc;
    public $education_level;
    public $major;
    public $street;
    public $num_int;
    public $num_ext;
    public $neighborhood;
    public $city;
    public $state;
    public $country;
    public $photo;
    public $professional_license;

    use WithFileUploads;

    protected $rules = [
        'first_name' => 'required|string|max:40',
        'father_surname' => 'required|string|max:30',
        'fathers_last_name' => 'required|string|max:30',
        'phone' => 'required|digits:10',
        'email' => 'required|email',
        'curp' => ['required','regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
        'rfc' => ['required','regex:/^[A-Z]{4}\d{6}[A-Z0-9]{3}$/'],
        'education_level' => 'required|in:licenciatura,maestría,doctorado',
        'major' => 'required|max:60',
        'street' => ['required','regex:/^[A-Za-z0-9áéíóúüñÁÉÍÓÚÜÑ.,\-()#&\/\s]{1,50}$/'],
        'num_int' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
        'num_ext' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
        'neighborhood' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+)*$/'],
        'city' => ['required','regex:/^(Ciudad|Municipio|Pueblo|Villa)?\s?[A-Za-zÁÉÍÓÚÑÜáéíóúñü]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü]+)*$/'],
        'state' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s]+$/'],
        'country' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s-]+$/'],
        'photo' => 'required|image|max:1024',
        'professional_license' => 'required|mimes:pdf'
    ];
    
    public function crearProfesor(){
        //Validar
        $datos = $this->validate();
        //Almacenamos imagen del profesor
        $photo = $this->photo->store('public/imageTeachers');
        $datos['photo'] = str_replace('public/imageTeachers/','',$photo);
        //Almacenanamos la cedProfesional del docente
        $professional_license = $this->professional_license->store('public/cedProfessional');
        $datos['professional_license'] = str_replace('public/cedProfessional/','',$professional_license);
        //Guardando registros
        //Se guarda dirección de docente 
        $direccion = Address::create([
            'street' => $datos['street'],
            'num_ext' => $datos['num_ext'],
            'num_int' => $datos['num_int'],
            'neighborhood' => $datos['neighborhood'],
            'city' => $datos['city'],
            'state' => $datos['state'],
            'country' => $datos['country'],
        ]);
        //Se gurda registro de docente
        Teacher::create([
            'first_name' => $datos['first_name'],
            'father_surname' => $datos['father_surname'],
            'fathers_last_name' => $datos['fathers_last_name'],
            'phone' => $datos['phone'],
            'email' => $datos['email'],
            'curp' => $datos['curp'],
            'rfc' => $datos['rfc'],
            'education_level' => $datos['education_level'],
            'major' => $datos['major'],
            'photo' => $datos['photo'],
            'professional_license' => $datos['professional_license'],
            'id_address' => $direccion->id
        ]);
        // Crear mensaje
        session()->flash('mensaje','Se registro al docente correctamente');
        return redirect()->route('teachers.create');
        //DB::transaction(function () {
            //Se fuerda registro docente
            
        //});
        
    }

    public function render()
    {
        return view('livewire.crear-profesor');
    }
}
