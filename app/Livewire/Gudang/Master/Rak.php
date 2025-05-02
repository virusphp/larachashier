<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Rak as AppRak;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Rak extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $noid;
    public string $nama_rak;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $raks = $this->getRaks();
        return view('livewire.gudang.master.rak', ['raks' => $raks]);
    }

    public function getRaks()
    {
        return AppRak::select('noid as no', 'nmrakbarang as nama_rak')->where('nmrakbarang', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['noid', 'nama_rak']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['noid', 'nama_rak']);
    }

    public function resetForm()
    {
        $this->noid = null;
        $this->nama_rak = '';
    }

    public function store()
    {
        $this->validate([
            'nama_rak' => 'required|string|max:255',
        ]);

        $checkNoId = AppRak::max('noid');
        if ($checkNoId == null) {
            $this->noid = 1;
        } else {
            $this->noid = $checkNoId + 1;
        }

        $rak = new AppRak;
        $rak->noid = $this->noid;
        $rak->nmrakbarang = $this->nama_rak;
        $rak->save();
        session()->flash('message', 'Rak created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $rak = AppRak::where('noid', $id)->first();
        if ($rak) {
            $this->noid = $rak->noid;
            $this->nama_rak = $rak->nmrakbarang;
        } else {
            session()->flash('error', 'Rak not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_rak' => 'required|string|max:255',
        ]);

        $rak = AppRak::where('noid', $id)->first();
        // dd($rak);
        if ($rak) {
            $rak->nmrakbarang = $this->nama_rak;
            $rak->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'Rak updated successfully.');
        } else {
            session()->flash('error', 'Rak not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->noid = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteRak()
    {
        $rak = AppRak::where('noid', $this->noid)->first();
        $rak->delete();
        $this->dispatch('rakDeleted');
    }
}
