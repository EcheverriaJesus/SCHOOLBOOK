<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Tutor;
use App\Models\Document;
use App\Models\Student;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditarAlumno extends Component
{
        public $student_id;
        public $address_id;
        public $document_id;
        public $tutor_id;
        public $student_name;
        public $paternal_surname;
        public $paternal_surnameS;
        public $maternal_surname;
        public $maternal_surnameS;
        public $grade;
        public $birth_date;
        public $curp;
        public $gender;
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
        public $photo_new;
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
        public $file_new;
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

    public function mount(Student $student){
        $this->student_id = $student->id;
        $this->address_id = $student->address_id; 
        $this->document_id = $student->document_id; 
        $this->tutor_id = $student->tutor_id; 
        $this->student_name = $student->student_name;
        $this->paternal_surnameS = $student->paternal_surname;
        $this->maternal_surnameS = $student->maternal_surname;
        $this->grade = $student->grade;
        $this->birth_date = $student->birth_date;
        $this->curp = $student->curp;
        $this->genderS = $student->gender;
        $this->genderT = $student->gender;
        $this->emailS = $student->email;
        $this->emailT = $student->email;
        $this->phoneS = $student->phone;
        $this->phoneT = $student->phone;
        $this->student_status = $student->status;
        $this->study_plan = $student->study_plan;
        $this->photo = $student->photo;
        $this->streetS = $student->address->street;
        $this->num_intS = $student->address->num_int;
        $this->num_extS = $student->address->num_ext;
        $this->neighborhoodS = $student->address->neighborhood;
        $this->cityS = $student->address->city;
        $this->stateS = $student->address->state;
        $this->countryS = $student->address->country;
        $this->document_name = $student->document->document_name;
        $this->document_status = $student->document->status;
        $this->file = $student->document->file;
        $this->tutor_name = $student->tutor->tutor_name;
        $this->paternal_surnameT = $student->tutor->paternal_surname;
        $this->maternal_surnameT = $student->tutor->maternal_surname;
        $this->genderT = $student->tutor->gender;
        $this->emailT = $student->tutor->email;
        $this->phoneT = $student->tutor->phone;
        $this->streetT = $student->tutor->address->street;
        $this->num_intT = $student->tutor->address->num_int;
        $this->num_extT = $student->tutor->address->num_ext;
        $this->neighborhoodT = $student->tutor->address->neighborhood;
        $this->cityT = $student->tutor->address->city;
        $this->stateT = $student->tutor->address->state;
        $this->countryT = $student->tutor->address->country;
    }

    public function editarAlumno()
    {
        //Validar campos
        $datos = $this->validate();
        //Encontrar el Alumno y dirección a editar (objeto ORM)
        $student = Student::find($this->student_id);
        $address = Address::find($this->address_id);
        $document = Document::find($this->document_id);
        $tutor = Tutor::find($this->tutor_id);
        //Hay una imagen nueva ??
        if($this->photo_new){
            //Se guarda la imagen y se obtiene la ruta
            $image = $this->photo_new->store('public/imageStudents');
            //Cortamos la ruta de la imagen para almacenar unicamente el nombre de la imagen
            $datos['photo'] = str_replace('public/imageStudents/','',$image);
            //Eliminamos imagen vieja
            Storage::delete('public/imageStudents/'.$student->photo);
        }
        if($this->file_new){
            //Se guarda el pdf y se obtiene la ruta
            $pdf = $this->file_new->store('public/fileStudents');
            //Cortamos la ruta del pdf para almacenar unicamente el nombre del pdf
            $datos['file'] = str_replace('public/fileStudents/','',$pdf);
            //Eliminamos archivo
            Storage::delete('public/fileStudents/'.$document->file);
        }

        //Asignar los valores student
        $student->student_name = $datos['student_name'];
        $student->paternal_surnameS = $datos['paternal_surnameS'];
        $student->maternal_surnameS = $datos['maternal_surnameS'];
        $student->grade = $datos['grade'];
        $student->birth_date = $datos['birth_date'];
        $student->curp = $datos['curp'];
        $student->genderS = $datos['genderS'];
        $student->emailS = $datos['emailS'];
        $student->phoneS = $datos['phoneS'];
        $student->student_status = $datos['student_status'];
        $student->study_plan = $datos['study_plan'];
        // photo student
        $student->photo = $datos['photo'] ?? $student->photo;
        //saved student
        $student->save();

        //Asignar los valores Address
        $address->streetS = $datos['streetS'];
        $address->num_intS = $datos['num_intS'];
        $address->num_extS = $datos['num_extS'];
        $address->neighborhoodS = $datos['neighborhoodS'];
        $address->cityS = $datos['cityS'];
        $address->stateS = $datos['stateS'];
        $address->countryS = $datos['countryS'];
        $address->save();

        //Asignar los valores Address Tutor
        $address->streetT = $datos['streetT'];
        $address->num_intT = $datos['num_intT'];
        $address->num_extT = $datos['num_extT'];
        $address->neighborhoodT = $datos['neighborhoodT'];
        $address->cityT = $datos['cityT'];
        $address->stateT = $datos['stateT'];
        $address->countryT = $datos['countryT'];
        $address->save();

        //Asignar los valores Document
        $document->document_name = $datos['document_name'];
        $document->document_status = $datos['document_status'];
        $document->file = $datos['file'] ?? $document->file;
        $document->save();

        //Asignar valores datos tutor
        $tutor->tutor_name = $datos['tutor_name'];
        $tutor->paternal_surname = $datos['paternal_surnameT'];
        $tutor->maternal_surname = $datos['maternal_surnameT'];
        $tutor->gender = $datos['genderT'];
        $tutor->email = $datos['emailT'];
        $tutor->phone = $datos['phoneT'];
        $document->save();

        //redireccionar with message
        session()->flash('mensaje','Los datos del Alumno se actualizarón correctamente');
        return redirect()->route('students.index');
    }
    public function render()
    {
        return view('livewire.editar-alumno');
    }
}
