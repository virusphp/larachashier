<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\Satuan as GudangSatuan;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Satuan extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $id_satuan;
    public string $nama_satuan;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $satuans = $this->getSatuans();
        return view('livewire.gudang.master.satuan', ['satuans' => $satuans]);
    }

    public function getSatuans()
    {
        return GudangSatuan::select('idsatuan as no', 'nmsatuan as nama_satuan')->where('nmsatuan', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['id_satuan', 'nama_satuan']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['id_satuan', 'nama_satuan']);
    }

    public function resetForm()
    {
        $this->id_satuan = null;
        $this->nama_satuan = '';
    }

    public function store()
    {
        $this->validate([
            'nama_satuan' => 'required|string|max:255',
        ]);

        $checkIdSatuan = GudangSatuan::max('idsatuan');
        if ($checkIdSatuan == null) {
            $this->id_satuan = 1;
        } else {
            $this->id_satuan = $checkIdSatuan + 1;
        }

        $satuan = new GudangSatuan;
        $satuan->idsatuan = $this->id_satuan;
        $satuan->nmsatuan = $this->nama_satuan;
        $satuan->save();
        session()->flash('message', 'satuan created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $satuan = GudangSatuan::where('idsatuan', $id)->first();
        if ($satuan) {
            $this->id_satuan = $satuan->idsatuan;
            $this->nama_satuan = $satuan->nmsatuan;
        } else {
            session()->flash('error', 'satuan not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_satuan' => 'required|string|max:255',
        ]);

        $satuan = GudangSatuan::where('idsatuan', $id)->first();
        // dd($satuan);
        if ($satuan) {
            $satuan->nmsatuan = $this->nama_satuan;
            $satuan->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'satuan updated successfully.');
        } else {
            session()->flash('error', 'satuan not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->id_satuan = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteSatuan()
    {
        $satuan = GudangSatuan::where('idsatuan', $this->id_satuan)->first();
        $satuan->delete();
        $this->dispatch('satuanDeleted');
    }
}
