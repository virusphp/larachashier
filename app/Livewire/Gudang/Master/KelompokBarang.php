<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\KelompokBarang as GudangKelompokBarang;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class KelompokBarang extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $kode_kelompok_obat;
    public $status_aktif;
    public string $nama_kelompok_obat;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $kelompokBarangs = $this->getJenisBarangs();
        return view('livewire.gudang.master.kelompok-barang', ['kelompokBarangs' => $kelompokBarangs]);
    }

    public function getJenisBarangs()
    {
        return GudangKelompokBarang::select('kd_kel_obat as kode_kelompok_obat', 'kel_obat as nama_kelompok_obat', 'stsaktif as status')->where('kel_obat', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_kelompok_obat', 'nama_kelompok_obat']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_kelompok_obat', 'nama_kelompok_obat']);
    }

    public function resetForm()
    {
        $this->kode_kelompok_obat = null;
        $this->nama_kelompok_obat = '';
    }

    public function store()
    {
        $this->validate([
            'nama_kelompok_obat' => 'required|string|max:255',
        ]);

        $checkKodeKelompokObat = GudangKelompokBarang::max('kd_kel_obat');
        if ($checkKodeKelompokObat == null) {
            $this->kode_kelompok_obat = 1;
        } else {
            $this->kode_kelompok_obat = $checkKodeKelompokObat + 1;
        }

        $kelompokBarang = new GudangKelompokBarang;
        $kelompokBarang->kd_kel_obat = $this->kode_kelompok_obat;
        $kelompokBarang->kel_obat = $this->nama_kelompok_obat;
        $kelompokBarang->save();
        session()->flash('message', 'Kelompok-obat created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $kelompokBarang = GudangKelompokBarang::where('kd_kel_obat', $id)->first();
        if ($kelompokBarang) {
            $this->kode_kelompok_obat = $kelompokBarang->kd_kel_obat;
            $this->nama_kelompok_obat = $kelompokBarang->kel_obat;
            $this->status_aktif = $kelompokBarang->stsaktif;
        } else {
            session()->flash('error', 'Kelompok-obat not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_kelompok_obat' => 'required|string|max:255',
        ]);

        $kelompokBarang = GudangKelompokBarang::where('kd_kel_obat', $id)->first();
        if ($kelompokBarang) {
            $kelompokBarang->kel_obat = $this->nama_kelompok_obat;
            $kelompokBarang->stsaktif = $this->status_aktif;
            $kelompokBarang->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'Kelompok-obat updated successfully.');
        } else {
            session()->flash('error', 'Kelompok-obat not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_kelompok_obat = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteJenisBarang()
    {
        $kelompokBarang = GudangKelompokBarang::where('kd_kel_obat', $this->kode_kelompok_obat)->first();
        $kelompokBarang->delete();
        $this->dispatch('kelompokBarangDeleted');
    }
}
