<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Suplier as GudangSuplier;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Suplier extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $kode_suplier;
    public string $nama_suplier;
    public string $alamat;
    public $telepon;
    public $nama_detail;
    public array $type_suplier = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $supliers = $this->getsupliers();
        return view('livewire.gudang.master.suplier', compact('supliers'));
    }

    public function getsupliers()
    {
        return GudangSuplier::select('kdsuplier as kode_suplier', 'nmsuplier as nama_suplier', 'alamat', 'telpon', 'nama_detail', 'type_suplier')->where('nmsuplier', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_suplier', 'nama_suplier', 'alamat', 'telepon', 'nama_detail', 'type_suplier']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_suplier', 'nama_suplier', 'alamat', 'telepon', 'nama_detail', 'type_suplier']);
    }

    public function resetForm()
    {
        $this->kode_suplier = null;
        $this->nama_suplier = '';
    }

    public function setKode()
    {
        $kodesuplier = "SPL";
        $maxNo = GudangSuplier::where('kdsuplier', 'like',  $kodesuplier . '%')->max('kdsuplier');
        if (!$maxNo) {
            $noUrut = 1;
        } else {
            $noUrut = (int) substr($maxNo, -3);
            $noUrut++;
        }
        $autoNumber['autonumber'] = $kodesuplier . sprintf("%03s", $noUrut);
        return $autoNumber['autonumber'];
    }

    public function store()
    {
        $this->validate([
            'nama_suplier' => 'required|string|max:255',
            'nama_detail' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        $this->kode_suplier = $this->setKode();

        $suplier = new GudangSuplier();
        $suplier->kdsuplier = $this->kode_suplier;
        $suplier->nmsuplier = $this->nama_suplier;
        $suplier->alamat = $this->alamat;
        $suplier->telpon = $this->telepon;
        $suplier->nama_detail = $this->nama_detail;
        $suplier->type_suplier = count($this->type_suplier) > 0 ? implode(',', $this->type_suplier) : $this->type_suplier;
        $suplier->save();
        session()->flash('message', 'Suplier created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $suplier = GudangSuplier::where('kdsuplier', $id)->first();
        if ($suplier) {
            $this->kode_suplier = $suplier->kdsuplier;
            $this->nama_suplier = $suplier->nmsuplier;
            $this->alamat = $suplier->alamat;
            $this->telepon = $suplier->telpon;
            $this->nama_detail = $suplier->nama_detail;
            $this->type_suplier = $suplier->type_suplier;
        } else {
            session()->flash('error', 'Suplier not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_suplier' => 'required|string|max:255',
            'nama_detail' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telpon' => 'required|string|max:255',
            'type_suplier' => 'required|string|max:255',
        ]);

        $suplier = GudangSuplier::where('kdsuplier', $id)->first();
        if ($suplier) {
            $suplier->nmsuplier = $this->nama_suplier;
            $suplier->alamat = $this->alamat;
            $suplier->telpon = $this->telepon;
            $suplier->nama_detail = $this->nama_detail;
            $suplier->type_suplier = $this->type_suplier;
            $suplier->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'Suplier updated successfully.');
        } else {
            session()->flash('error', 'Suplier not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_suplier = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteRak()
    {
        $suplier = GudangSuplier::where('kdsuplier', $this->kode_suplier)->first();
        $suplier->delete();
        $this->dispatch('suplierDeleted');
    }
}
