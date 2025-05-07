<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Pabrik as GudangPabrik;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Pabrik extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $kode_pabrik;
    public string $nama_pabrik;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pabriks = $this->getPabriks();
        return view('livewire.gudang.master.pabrik', ['pabriks' => $pabriks]);
    }

    public function getPabriks()
    {
        return GudangPabrik::select('kdpabrik as kode_pabrik', 'nmpabrik as nama_pabrik')->where('nmpabrik', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_pabrik', 'nama_pabrik']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_pabrik', 'nama_pabrik']);
    }

    public function resetForm()
    {
        $this->kode_pabrik = null;
        $this->nama_pabrik = '';
    }

    public function setKode()
    {
        $kodepabrik = "PB";
        $maxNo = GudangPabrik::where('kdpabrik', 'like',  $kodepabrik . '%')->max('kdpabrik');
        if (!$maxNo) {
            $noUrut = 1;
        } else {
            $noUrut = (int) substr($maxNo, -3);
            $noUrut++;
        }
        $autoNumber['autonumber'] = $kodepabrik . sprintf("%03s", $noUrut);
        return $autoNumber['autonumber'];
    }

    public function store()
    {
        $this->validate([
            'nama_pabrik' => 'required|string|max:255',
        ]);

        $this->kode_pabrik = $this->setKode();

        $pabrik = new GudangPabrik;
        $pabrik->kdpabrik = $this->kode_pabrik;
        $pabrik->nmpabrik = $this->nama_pabrik;
        $pabrik->save();
        session()->flash('message', 'pabrik created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $pabrik = GudangPabrik::where('kdpabrik', $id)->first();
        dd($pabrik);
        if ($pabrik) {
            $this->kode_pabrik = $pabrik->kdpabrik;
            $this->nama_pabrik = $pabrik->nmpabrik;
        } else {
            session()->flash('error', 'pabrik not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_pabrik' => 'required|string|max:255',
        ]);

        $pabrik = GudangPabrik::where('kdpabrik', $id)->first();
        // dd($pabrik);
        if ($pabrik) {
            $pabrik->nmpabrik = $this->nama_pabrik;
            $pabrik->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'pabrik updated successfully.');
        } else {
            session()->flash('error', 'pabrik not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_pabrik = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deletepabrik()
    {
        $pabrik = GudangPabrik::where('kdpabrik', $this->kode_pabrik)->first();
        $pabrik->delete();
        $this->dispatch('pabrikDeleted');
    }
}
