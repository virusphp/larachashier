<?php

namespace App\Livewire\Gudang\Master;

use Livewire\Component;

class RakEdit extends Component
{
    public $dataRak = [];

    public function mount($id)
    {
        dd($id);
    }

    public function render()
    {
        return view('livewire.gudang.master.rak-edit');
    }
}
