<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\JenisBarang as GudangJenisBarang;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class JenisBarang extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $kode_jenis_obat;
    public $status_aktif;
    public string $nama_jenis_obat;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jenisBarangs = $this->getJenisBarangs();
        return view('livewire.gudang.master.jenis-barang', ['jenisBarangs' => $jenisBarangs]);
    }

    public function getJenisBarangs()
    {
        return GudangJenisBarang::select('kd_jns_obat as kode_jenis_obat', 'jns_obat as nama_jenis_obat', 'stsaktif as status')->where('jns_obat', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_jenis_obat', 'nama_jenis_obat']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_jenis_obat', 'nama_jenis_obat']);
    }

    public function resetForm()
    {
        $this->kode_jenis_obat = null;
        $this->nama_jenis_obat = '';
    }

    public function store()
    {
        $this->validate([
            'nama_jenis_obat' => 'required|string|max:255',
        ]);

        $checkKodeJenisObat = GudangJenisBarang::max('kd_jns_obat');
        if ($checkKodeJenisObat == null) {
            $this->kode_jenis_obat = 1;
        } else {
            $this->kode_jenis_obat = $checkKodeJenisObat + 1;
        }

        $jenisBarang = new GudangJenisBarang;
        $jenisBarang->kd_jns_obat = $this->kode_jenis_obat;
        $jenisBarang->jns_obat = $this->nama_jenis_obat;
        $jenisBarang->save();
        session()->flash('message', 'Jenis-obat created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $jenisBarang = GudangJenisBarang::where('kd_jns_obat', $id)->first();
        if ($jenisBarang) {
            $this->kode_jenis_obat = $jenisBarang->kd_jns_obat;
            $this->nama_jenis_obat = $jenisBarang->jns_obat;
            $this->status_aktif = $jenisBarang->stsaktif;
        } else {
            session()->flash('error', 'Jenis-obat not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_jenis_obat' => 'required|string|max:255',
        ]);

        $jenisBarang = GudangJenisBarang::where('kd_jns_obat', $id)->first();
        if ($jenisBarang) {
            $jenisBarang->jns_obat = $this->nama_jenis_obat;
            $jenisBarang->stsaktif = $this->status_aktif;
            $jenisBarang->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'Jenis-obat updated successfully.');
        } else {
            session()->flash('error', 'Jenis-obat not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_jenis_obat = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteJenisBarang()
    {
        $jenisBarang = GudangJenisBarang::where('kd_jns_obat', $this->kode_jenis_obat)->first();
        $jenisBarang->delete();
        $this->dispatch('jenisBarangDeleted');
    }
}
