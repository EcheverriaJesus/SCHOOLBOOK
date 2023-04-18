<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notice;

class MostrarNotice extends Component
{
    public $searchTerm;
    protected $listeners = [
        'deleteTeacher',
        'search' => 'setData'
    ];

    public function setData($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

    public function deleteNotice($id)
    {   
        // Buscar el aviso por ID
        $notice = Notice::findOrFail($id);
    
        // Verificar que el aviso existe
        if ($notice) {
            // Eliminar la foto del aviso si existe
            if ($notice->photo) {
                Storage::delete('public/imageNotice/' . $notice->photo);
            }
            // Eliminar el aviso
            $notice->delete();
    
            // Emitir un evento para actualizar la lista de avisos
            $this->emit('noticeDeleted');
        }
    }

    public function render()
{
    $searchTerm = $this->searchTerm;
    $notices = Notice::when($this->searchTerm, function ($query) {
            $query->where('title', 'LIKE', "%" . $this->searchTerm . "%")
                  ->orWhere('description', 'LIKE', "%" . $this->searchTerm . "%")
                  ->orWhere('start_date', 'LIKE', "%" . $this->searchTerm . "%");
        })
        ->get();
    $data = Notice::all();

    return view('livewire.mostrar-notice', [
        'notices' => $notices,
        'searchTerm' => $searchTerm,
        'data' => $data,
    ]);
}

}
