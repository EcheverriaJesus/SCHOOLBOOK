<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Document;
use App\Models\Tutor;
use App\Models\Student;
use Livewire\WithFileUploads;
use Livewire\Component;

class CrearAlumno extends Component
{
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
        public $street;
        public $num_int;
        public $num_ext;
        public $neighborhood;
        public $city;
        public $state;
        public $country;

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
            'study_plan' => 'required|string|max:100',
            'photo' => 'required|image|max:1024',
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

        public function crearAlumno(){
            //Validar
            $datos = $this->validate();
            //Almacenamos imagen del Alumno
            $photo = $this->photo->store('public/imageStudents');
            $datos['photo'] = str_replace('public/imageStudents/','',$photo);
            //Guardando registros
            //Se guarda dirección del Alumno 
            $direccion = Address::create([
                'street' => $datos['street'],
                'num_ext' => $datos['num_ext'],
                'num_int' => $datos['num_int'],
                'neighborhood' => $datos['neighborhood'],
                'city' => $datos['city'],
                'state' => $datos['state'],
                'country' => $datos['country'],
            ]);
        //    $tutor = Tutor::create([
        //         'tutor_name' => $datos['tutor_name'],
        //         'paternal_surname' => $datos['paternal_surname'],
        //         'maternal_surname' => $datos['maternal_surname'],
        //         'gender' => $datos['gender'],
        //         'email' => $datos['email'],
        //         'state' => $datos['state'],
        //         'phone' => $datos['phone'],
        //         'id_address' => $direccion->id
        //     ]);
            // $Document = Document::create([
            //     'document_name' => $datos['document_name'],
            //     'status' => $datos['status'],
            //     'file' => $datos['file'],
            // ]);

            Student::create([
                'student_name' => $datos['student_name'],
                'paternal_surname' => $datos['paternal_surname'],
                'maternal_surname' => $datos['maternal_surname'],
                'grade' => $datos['grade'],
                'birth_date' => $datos['birth_date'],
                'curp' => $datos['curp'],
                'gender' => $datos['gender'],
                'email' => $datos['email'],
                'phone' => $datos['phone'],
                'status' => $datos['status'],
                'study_plan' => $datos['study_plan'],
                'photo' => $datos['photo'],
                'address_id' => $direccion->id
                // 'id_tutor' => $tutor->id,
                // 'document_name' => $datos['document_name'],
                // 'file' => $datos['file']
            ]);

            session()->flash('mensaje','Se registro al Alumno correctamente');
            return redirect()->route('students.index');
        } 

    public function render()
    {
        return view('livewire.crear-alumno');
    }
}
