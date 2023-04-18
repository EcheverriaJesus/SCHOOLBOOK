<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditarProfesor extends Component
{
    //atributos
    public $teacher_id;
    public $address_id;
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
    public $photo_new;
    public $professional_license;
    public $professional_license_new;

    //importar clase de subida de archivos
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
        'photo_new' => 'nullable|image|max:1024',
        'professional_license_new' => 'nullable|mimes:pdf'
    ];

    public function mount(Teacher $teacher){
        $this->teacher_id = $teacher->id;
        $this->address_id = $teacher->address_id; 
        $this->first_name = $teacher->first_name;
        $this->father_surname = $teacher->father_surname;
        $this->fathers_last_name = $teacher->fathers_last_name;
        $this->phone = $teacher->phone;
        $this->email = $teacher->email;
        $this->curp = $teacher->curp;
        $this->rfc = $teacher->rfc;
        $this->education_level = $teacher->education_level;
        $this->major = $teacher->major;
        $this->street = $teacher->address->street;
        $this->num_int = $teacher->address->num_int;
        $this->num_ext = $teacher->address->num_ext;
        $this->neighborhood = $teacher->address->neighborhood;
        $this->city = $teacher->address->city;
        $this->state = $teacher->address->state;
        $this->country = $teacher->address->country;
        $this->photo = $teacher->photo;
        $this->professional_license = $teacher->professional_license;
    }
    
    public function editarProfesor()
    {
        //Validar campos
        $datos = $this->validate();
        //Encontrar el profesor y dirección a editar (objeto ORM)
        $teacher = Teacher::find($this->teacher_id);
        $address = Address::find($this->address_id);
        //Hay una imagen nueva ??
        if($this->photo_new){
            //Se guarda la imagen y se obtiene la ruta
            $image = $this->photo_new->store('public/imageTeachers');
            //Cortamos la ruta de la imagen para almacenar unicamente el nombre de la imagen
            $datos['image'] = str_replace('public/imageTeachers/','',$image);
            //Eliminamos imagen vieja
            Storage::delete('public/imageTeachers/'.$teacher->photo);
        }
        //Hay una nueva cedula Profesional ??
        if($this->professional_license_new){
            //Se guarda el pdf y se obtiene la ruta
            $pdf = $this->professional_license_new->store('public/cedProfessional');
            //Cortamos la ruta del pdf para almacenar unicamente el nombre del pdf
            $datos['professional_license'] = str_replace('public/cedProfessional/','',$pdf);
            //Eliminamos la ced. profesional vieja
            Storage::delete('public/cedProfessional/'.$teacher->professional_license);
        }

        //Asignar los valores Teacher
        $teacher->first_name = $datos['first_name'];
        $teacher->father_surname = $datos['father_surname'];
        $teacher->fathers_last_name = $datos['fathers_last_name'];
        $teacher->phone = $datos['phone'];
        $teacher->email = $datos['email'];
        $teacher->curp = $datos['curp'];
        $teacher->rfc = $datos['rfc'];
        $teacher->education_level = $datos['education_level'];
        $teacher->major = $datos['major'];
        // photo teacher
        $teacher->photo = $datos['photo'] ?? $teacher->photo;
        // pdf ced. Professional
        $teacher->professional_license = $datos['professional_license'] ?? $teacher->professional_license;
        //saved Teacher
        $teacher->save();

        //Asignar los valores Address
        $address->street = $datos['street'];
        $address->num_int = $datos['num_int'];
        $address->num_ext = $datos['num_ext'];
        $address->neighborhood = $datos['neighborhood'];
        $address->city = $datos['city'];
        $address->state = $datos['state'];
        $address->country = $datos['country'];
        $address->save();
        $this->emitTo('MuestraProfesor','updateTeacher');
        //redireccionar with message
        session()->flash('mensaje','Los datos del profesor se actualizarón correctamente');
        return redirect()->route('teachers.index');
    }

    public function render()
    {
        return view('livewire.editar-profesor');
    }
}
