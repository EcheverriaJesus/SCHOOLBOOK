<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Student;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditarAlumno extends Component
{
    public $student_id;
    public $address_id;
    public $student_name;
    public $paternal_surname;
    public $maternal_surname;
    public $grade;
    public $birth_date;
    public $curp;
    public $gender;
    public $email;
    public $phone;
    public $status;
    public $study_plan;
    public $photo;
    public $photo_new;
    public $street;
    public $num_int;
    public $num_ext;
    public $neighborhood;
    public $city;
    public $state;
    public $country;
    public $address;

    use WithFileUploads;

    protected $rules = [
        'student_name' => 'required|string|max:40',
        'paternal_surname' => 'required|string|max:30',
        'maternal_surname' => 'required|string|max:30',
        'grade' => 'required|integer|between:1,6',
        'birth_date' => 'required|date',
        'curp' => ['required','regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
        'gender' => 'required|string|max:10',
        'email' => 'required|email',           
        'phone' => 'required|digits:10',
        'status' => 'required|boolean',
        // 'status' => 'required|string|max:20',
        'study_plan' => 'required|string|max:100',
        // 'photo' => 'required|image|max:1024',
        'photo_new' => 'nullable|image|max:1024',
        'street' => ['required','regex:/^[A-Za-z0-9áéíóúüñÁÉÍÓÚÜÑ.,\-()#&\/\s]{1,50}$/'],
        'num_int' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
        'num_ext' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
        'neighborhood' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+)*$/'],
        'city' => ['required','regex:/^(Ciudad|Municipio|Pueblo|Villa)?\s?[A-Za-zÁÉÍÓÚÑÜáéíóúñü]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü]+)*$/'],
        'state' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s]+$/'],
        'country' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s-]+$/'],
        // 'tutor_name' => 'required|string|max:40',
        // 'document_name' => 'required|string|max:40',
        // 'file' => 'required|mimes:pdf'
    ];

    public function mount(Student $student){
        $this->student_id = $student->id;
        $this->address_id = $student->address_id; 
        $this->student_name = $student->student_name;
        $this->paternal_surname = $student->paternal_surname;
        $this->maternal_surname = $student->maternal_surname;
        $this->grade = $student->grade;
        $this->birth_date = $student->birth_date;
        $this->curp = $student->curp;
        $this->gender = $student->gender;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->status = $student->status;
        $this->study_plan = $student->study_plan;
        $this->photo = $student->photo;
        $this->street = $student->address->street;
        $this->num_int = $student->address->num_int;
        $this->num_ext = $student->address->num_ext;
        $this->neighborhood = $student->address->neighborhood;
        $this->city = $student->address->city;
        $this->state = $student->address->state;
        $this->country = $student->address->country;
    }

    public function editarAlumno()
    {
        //Validar campos
        $datos = $this->validate();
        //Encontrar el Alumno y dirección a editar (objeto ORM)
        $student = Student::find($this->student_id);
        $address = Address::find($this->address_id);
        //Hay una imagen nueva ??
        if($this->photo_new){
            //Se guarda la imagen y se obtiene la ruta
            $image = $this->photo_new->store('public/imageStudents');
            //Cortamos la ruta de la imagen para almacenar unicamente el nombre de la imagen
            $datos['photo'] = str_replace('public/imageStudents/','',$image);
            //Eliminamos imagen vieja
            Storage::delete('public/imageStudents/'.$student->photo);
        }

        //Asignar los valores student
        $student->student_name = $datos['student_name'];
        $student->paternal_surname = $datos['paternal_surname'];
        $student->maternal_surname = $datos['maternal_surname'];
        $student->grade = $datos['grade'];
        $student->birth_date = $datos['birth_date'];
        $student->curp = $datos['curp'];
        $student->gender = $datos['gender'];
        $student->email = $datos['email'];
        $student->phone = $datos['phone'];
        $student->status = $datos['status'];
        $student->study_plan = $datos['study_plan'];
        // photo student
        $student->photo = $datos['photo'] ?? $student->photo;
        //saved student
        $student->save();

        //Asignar los valores Address
        $address->street = $datos['street'];
        $address->num_int = $datos['num_int'];
        $address->num_ext = $datos['num_ext'];
        $address->neighborhood = $datos['neighborhood'];
        $address->city = $datos['city'];
        $address->state = $datos['state'];
        $address->country = $datos['country'];
        $address->save();
        //redireccionar with message
        session()->flash('mensaje','Los datos del Alumno se actualizarón correctamente');
        return redirect()->route('students.index');
    }
    public function render()
    {
        return view('livewire.editar-alumno');
    }
}
