<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        'curp' => ['required', 'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/'],
        'rfc' => ['required', 'regex:/^[A-Z]{4}\d{6}[A-Z0-9]{3}$/'],
        'education_level' => 'required|in:licenciatura,maestría,doctorado',
        'major' => 'required|max:60',
        'street' => ['required', 'regex:/^[A-Za-z0-9áéíóúüñÁÉÍÓÚÜÑ.,\-()#&\/\s]{1,50}$/'],
        'num_int' => ['required', 'regex:/^[0-9]+[a-zA-Z]*$/'],
        'num_ext' => ['required', 'regex:/^[0-9]+[a-zA-Z]*$/'],
        'neighborhood' => ['required', 'regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü0-9]+)*$/'],
        'city' => ['required', 'regex:/^(Ciudad|Municipio|Pueblo|Villa)?\s?[A-Za-zÁÉÍÓÚÑÜáéíóúñü]+([\s-][A-Za-zÁÉÍÓÚÑÜáéíóúñü]+)*$/'],
        'state' => ['required', 'regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s]+$/'],
        'country' => ['required', 'regex:/^[A-Za-zÁÉÍÓÚÑÜáéíóúñü\s-]+$/'],
        'photo' => 'required|image|max:1024',
        'professional_license' => 'required|mimes:pdf'
    ];

    function generarPassword()
    {
        $password = '';
        for ($i = 0; $i < 6; $i++) {
            $password .= rand(0, 9); 
        }
        return $password;
    }

function generarClaveProfesor()
{
    // Obtener el último número de la clave de la base de datos
    $ultimoNumero = DB::table('teachers')
        ->where('teacherID', 'like', '70%')
        ->orderBy('teacherID', 'desc')
        ->value(DB::raw('SUBSTRING(teacherID, 3)'));

    // Si no hay profesores previos con la misma clave, establecer el siguiente número como 1, de lo contrario, sumar 1 al último número
    $siguienteNumero = ($ultimoNumero) ? intval($ultimoNumero) + 1 : 1;

    // Obtener la letra correspondiente
    $letra = chr(65 + ((int)($siguienteNumero / 10000) % 3)); // Cambiar letra cada 9999 claves, se establecen 3 letras A, B, C

    // Concatenar los elementos de la clave y devolverla
    return '70' . str_pad($siguienteNumero % 10000, 4, '0', STR_PAD_LEFT) . $letra;
}

    public function crearProfesor(){
        //Validar
        $datos = $this->validate();
        
        $matricula = $this->generarClaveProfesor();
        $passwordTeacher = $this->generarPassword();

        //Almacenamos imagen del profesor
        $photo = $this->photo->store('public/imageTeachers');
        $datos['photo'] = str_replace('public/imageTeachers/', '', $photo);
        //Almacenanamos la cedProfesional del docente
        $professional_license = $this->professional_license->store('public/cedProfessional');
        $datos['professional_license'] = str_replace('public/cedProfessional/', '', $professional_license);
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
        /* $teacher = */ Teacher::create([
            'teacherID'=>$matricula,
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
            'address_id' => $direccion->id
        ]);
        
        //Se crea usuario para el docente
        $user = User::create([
            'name' => $datos['first_name'].' '.$datos['father_surname'].$datos['fathers_last_name'],
            'email' => $datos['email'],
            'password' => Hash::make($passwordTeacher),
        ]);

        $user->assignRole('docente'); // Asignar rol al usuario
        
        // Crear mensaje
        session()->flash('mensaje','Se registró al docente correctamente. La contraseña inicial del docente es '.$passwordTeacher);
        return redirect()->route('teachers.index');
    }


    public function render()
    {
        return view('livewire.crear-profesor');
    }
}
