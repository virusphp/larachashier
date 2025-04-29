<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Rak as AppRak;
use Livewire\Component;

class Rak extends Component
{
    public $search = '';

    public function render()
    {
        $dataRak = AppRak::select('noid as no', 'nmrakbarang as nama_rak')->where('nmrakbarang', 'like', '%' . $this->search . '%')->paginate(25);
        return view('livewire.gudang.master.rak', compact('dataRak'));
    }
}
