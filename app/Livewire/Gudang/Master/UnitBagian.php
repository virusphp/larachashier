<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Unit;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UnitBagian extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public bool $isTableMode = true;
    public $search = '';
    public $kode_bagian;
    public string $nama_bagian;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $units = $this->getUnits();
        return view('livewire.gudang.master.unit-bagian', compact('units'));
    }

    public function getUnits()
    {
        return Unit::select('kdbagian as kode_bagian', 'nmbagian as nama_bagian', 'status_apotik')->where('nmbagian', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_bagian', 'nama_bagian']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_bagian', 'nama_bagian']);
    }

    public function resetForm()
    {
        $this->kode_bagian = null;
        $this->nama_bagian = '';
    }

    public function setKode()
    {
        $kodeBagian = "BG";
        $maxNo = Unit::where('kdbagian', 'like',  $kodeBagian . '%')->max('kdbagian');
        if (!$maxNo) {
            $noUrut = 1;
        } else {
            $noUrut = (int) substr($maxNo, -3);
            $noUrut++;
        }
        $autoNumber['autonumber'] = $kodeBagian . sprintf("%03s", $noUrut);
        return $autoNumber['autonumber'];
    }

    public function store()
    {
        $this->validate([
            'nama_bagian' => 'required|string|max:255',
        ]);

        $this->kode_bagian = $this->setKode();
        // dd($this->kode_bagian);

        $unit = new Unit();
        $unit->kdbagian = $this->kode_bagian;
        $unit->nmbagian = $this->nama_bagian;
        $unit->save();
        session()->flash('message', 'Unit created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        // dd($id);
        $this->isTableMode = false;
        $unit = Unit::where('kdbagian', $id)->first();
        if ($unit) {
            $this->kode_bagian = $unit->kdbagian;
            $this->nama_bagian = $unit->nmbagian;
        } else {
            session()->flash('error', 'Unit not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_bagian' => 'required|string|max:255',
        ]);

        $unit = Unit::where('kdbagian', $id)->first();
        if ($unit) {
            $unit->nmbagian = $this->nama_bagian;
            $unit->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'Unit updated successfully.');
        } else {
            session()->flash('error', 'Unit not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_bagian = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteRak()
    {
        $unit = Unit::where('kdbagian', $this->kode_bagian)->first();
        $unit->delete();
        $this->dispatch('unitDeleted');
    }
}
