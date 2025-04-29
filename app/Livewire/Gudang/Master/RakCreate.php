<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Rak;
use Livewire\Component;

class RakCreate extends Component
{
    public $noid;
    public $nama_rak;

    public function render()
    {
        return view('livewire.gudang.master.rak-create');
    }

    public function store()
    {
        $this->validate([
            'nama_rak' => 'required|string|max:255',
        ]);

        $checkNoId = Rak::max('noid');
        if ($checkNoId == null) {
            $this->noid = 1;
        } else {
            $this->noid = $checkNoId + 1;
        }

        $rak = new \App\Models\Gudang\Rak();
        $rak->noid = $this->noid;
        $rak->nmrakbarang = $this->nama_rak;
        $rak->save();

        session()->flash('message', 'Rak created successfully.');
        return redirect()->route('gudang.rak.index');
    }
}
