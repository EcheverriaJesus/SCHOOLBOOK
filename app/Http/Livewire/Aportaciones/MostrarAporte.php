<?php

namespace App\Http\Livewire\Aportaciones;

use App\Models\Contribution;
use App\Models\Student;
use Livewire\Component;

class MostrarAporte extends Component
{

    public $aporteid;
    public $amount;
    public $status;
    public $description;
    public $contribution_date;
    public $contribution_date_new;
    public $deadline_date;
    public $deadline_date_new;
    public $student_id;
    public $searchTerm;

    protected $listeners = [
        'setData',
        'editarAporte',
        'deleteAporte',
        'searchAporte' => 'setSearch'
    ];

    protected $rules = [
        'amount' => 'required|integer',
        'status' => 'nullable|in:1,0',
        'description' => 'required|string|max:100',
        'contribution_date_new' => 'nullable|date',
        'deadline_date_new' => 'nullable|date',
        'student_id' => 'required|exists:students,id'
    ];
    public function setData($idAporte)
    {
        $this->aporteid = $idAporte;
        $aporte = Contribution::find($this->aporteid);
        $this->amount = $aporte->amount;
        $this->description = $aporte->description;
        $this->contribution_date = $aporte->contribution_date->formatLocalized('%A %d %B %Y');
        $this->deadline_date = $aporte->deadline_date->formatLocalized('%A %d %B %Y');
        $this->status = $aporte->status; 
        $this->student_id = $aporte->student_id; 
    }
    public function setSearch($searchAporte)
    {
        $this->searchTerm = $searchAporte;
    }
    public function deleteAporte(Contribution $aporte)
    {   
        //se elimina teacher
        $aporte->delete();
    }
    public function editarAporte()
    {
        if($this->status != 1){
            $this->status = 0;
        }
        //Validar campos
        $datos = $this->validate();
        $aporte = Contribution::find($this->aporteid);
        //Asignar y guardar los valores Cycle
        $aporte->amount = $datos['amount'];
        $aporte->description = $datos['description'];
        $aporte->contribution_date = $datos['contribution_date_new'] ?? $aporte->contribution_date;
        $aporte->deadline_date = $datos['deadline_date_new'] ?? $aporte->deadline_date;
        $aporte->status = $datos['status'];
        $aporte->save();
        //redireccionar with message
        session()->flash('mensaje', 'Los datos del ciclo escolar se actualizarón correctamente');
        return redirect()->route('contributions.index');
    }
    public function render()
    {
        $searchTerm = $this->searchTerm;
        $data = Contribution::all();
        $contributions = Contribution::when($this->searchTerm,function($query){
            $query->where('amount','LIKE',"%" .$this->searchTerm ."%");
        })->paginate(8);
        $students = Student::all();
        return view('livewire.aportaciones.mostrar-aporte', [
            'students' => $students,
            'contributions' => $contributions,
            'data' => $data,
            'searchTerm' => $searchTerm,
        ]);
    }
}
