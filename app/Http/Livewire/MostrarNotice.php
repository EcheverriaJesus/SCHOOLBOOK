<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarNotice extends Component
{
    public function render()
    {
        return view('livewire.mostrar-notice');
    }
    protected $listeners = [
        'deleteNotice' => 'destroyNotice',
    ];

}
