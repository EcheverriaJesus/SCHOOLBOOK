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
        public $paternal_surnameS;
        public $maternal_surname;
        public $maternal_surnameS;
        public $grade;
        public $birth_date;
        public $curp;
        public $genderS;
        public $email;
        public $emailS;
        public $phone;
        public $phoneS;
        public $status;
        public $student_status;
        public $document_status;
        public $study_plan;
        public $photo;
        public $street;
        public $num_int;
        public $num_ext;
        public $neighborhood;
        public $city;
        public $state;
        public $country;
        public $streetS;
        public $num_intS;
        public $num_extS;
        public $neighborhoodS;
        public $cityS;
        public $stateS;
        public $countryS;
        public $document_name;
        public $file;
        public $tutor_name;
        public $paternal_surnameT;
        public $maternal_surnameT;
        public $genderT;
        public $emailT;
        public $phoneT;
        public $streetT;
        public $num_intT;
        public $num_extT;
        public $neighborhoodT;
        public $cityT;
        public $stateT;
        public $countryT;



        use WithFileUploads;
        
        protected $rules = [
            'student_name' => 'required|string|max:40',
            'paternal_surnameS' => 'required|string|max:30',
            'paternal_surnameT' => 'required|string|max:30',
            'maternal_surnameS' => 'required|string|max:30',
            'maternal_surnameT' => 'required|string|max:30',
            'grade' => 'required|integer|between:1,6',
            'birth_date' => 'required|date',
            'curp' => ['required','regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
            'genderT' => 'required|string|max:10',
            'genderS' => 'required|string|max:10',
            'emailT' => 'required|email',           
            'emailS' => 'required|email',           
            'phoneT' => 'required|digits:10',
            'phoneS' => 'required|digits:10',
            'student_status' => 'required|boolean',
            'document_status' => 'required|boolean',
            'study_plan' => 'required|string|max:100',
            'photo' => 'required|image|max:1024',
            'streetS' => ['required','regex:/^[A-Za-z0-9áéíóúüñÁÉÍÓÚÜÑ.,\-()#&\/\s]{1,50}$/'],
            'streetT' => ['required','regex:/^[A-Za-z0-9áéíóúüñÁÉÍÓÚÜÑ.,\-()#&\/\s]{1,50}$/'],
            'num_intS' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
            'num_intT' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
            'num_extS' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
            'num_extT' => ['required','regex:/^[0-9]+[a-zA-Z]*$/'],
            'neighborhoodT' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+)*$/'],
            'neighborhoodS' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+)*$/'],
            'cityS' => ['required','regex:/^(Ciudad|Municipio|Pueblo|Villa)?\s?[A-Za-zÁÉÍÓÚÑÜáéíóúñü]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü]+)*$/'],
            'cityT' => ['required','regex:/^(Ciudad|Municipio|Pueblo|Villa)?\s?[A-Za-zÁÉÍÓÚÑÜáéíóúñü]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü]+)*$/'],
            'stateS' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s]+$/'],
            'stateT' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s]+$/'],
            'countryS' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s-]+$/'],
            'countryT' => ['required','regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s-]+$/'],
            'tutor_name' => 'required|string|max:40',
            'document_name' => 'required|string|max:40',
            'file' => 'required|mimes:pdf'
        ];

        public function crearAlumno(){
            //Validar
            $datos = $this->validate();
            //Almacenamos imagen del Alumno
            $photo = $this->photo->store('public/imageStudents');
            $datos['photo'] = str_replace('public/imageStudents/','',$photo);
            //Almacenanamos los documentos del alumno
            $file = $this->file->store('public/fileStudents');
            $datos['file'] = str_replace('public/fileStudents/','',$file);
            //Guardando registros
            //Se guarda dirección del Alumno 
            $direccion = Address::create([
                'street' => $datos['streetS'],
                'num_ext' => $datos['num_extS'],
                'num_int' => $datos['num_intS'],
                'neighborhood' => $datos['neighborhoodS'],
                'city' => $datos['cityS'],
                'state' => $datos['stateS'],
                'country' => $datos['countryS'],
            ]);
            $direc = Address::create([
                'street' => $datos['streetT'],
                'num_ext' => $datos['num_extT'],
                'num_int' => $datos['num_intT'],
                'neighborhood' => $datos['neighborhoodT'],
                'city' => $datos['cityT'],
                'state' => $datos['stateT'],
                'country' => $datos['countryT'],
            ]);
            $tutor = Tutor::create([
                'tutor_name' => $datos['tutor_name'],
                'paternal_surname' => $datos['paternal_surnameT'],
                'maternal_surname' => $datos['maternal_surnameT'],
                'gender' => $datos['genderT'],
                'email' => $datos['emailT'],
                'phone' => $datos['phoneT'],
                'address_id' => $direc->id
            ]);
            $documentos = Document::create([
              'document_name' => $datos['document_name'],
              'status' => $datos['document_status'],
              'file' => $datos['file']
            ]);

            Student::create([
                'student_name' => $datos['student_name'],
                'paternal_surname' => $datos['paternal_surnameS'],
                'maternal_surname' => $datos['maternal_surnameS'],
                'grade' => $datos['grade'],
                'birth_date' => $datos['birth_date'],
                'curp' => $datos['curp'],
                'gender' => $datos['genderS'],
                'email' => $datos['emailS'],
                'phone' => $datos['phoneS'],
                'status' => $datos['student_status'],
                'study_plan' => $datos['study_plan'],
                'photo' => $datos['photo'],
                'address_id' => $direccion->id,
                'document_id' => $documentos->id,
                'tutor_id' => $tutor->id
            ]);

            session()->flash('mensaje','Se registro al Alumno correctamente');
            return redirect()->route('students.index');
        } 

    public function render()
    {
        return view('livewire.crear-alumno');
    }
}