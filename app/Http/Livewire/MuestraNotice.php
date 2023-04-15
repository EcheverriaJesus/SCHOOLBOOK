<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class MuestraNotice extends Component
{
    public $notice;
    public $noticeId;
    protected $listeners = [
        'updateNotice' => 'render'
    ];
    public function render()
    {
        $noticeId = $this->notice->id;
        $notice = Notice::where('id', $noticeId);
        /* return view('livewire.muestra-notice'); */
        return view('livewire.muestra-notice', [
            'notice' => $notice]);
    }
}
