<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Rak;
use Livewire\Component;

class RakEdit extends Component
{
    public $dataRak;

    public $noid;
    public $nama_rak;

    public function mount($rak)
    {
        $this->dataRak = Rak::select('noid as no', 'nmrakbarang as nama_rak')
            ->where('noid', $rak)
            ->first();
    }

    public function render()
    {
        $this->nama_rak = $this->dataRak->nama_rak;
        return view('livewire.gudang.master.rak-edit', [
            'dataRak' => $this->dataRak
        ]);
    }

    public function update()
    {
        $this->validate([
            'nama_rak' => 'required|string|max:255',
        ]);

        $this->dataRak->nama_rak = $this->nama_rak;
        $this->dataRak->save();

        session()->flash('message', 'Rak update successfully.');
        return redirect()->route('gudang.rak.index');
    }
}
