<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\GolonganBarang as GudangGolonganBarang;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class GolonganBarang extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $kode_golongan_obat;
    public $status_aktif = "1";
    public string $nama_golongan_obat;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $golonganBarangs = $this->getJenisBarangs();
        return view('livewire.gudang.master.golongan-barang', ['golonganBarangs' => $golonganBarangs]);
    }

    public function getJenisBarangs()
    {
        return GudangGolonganBarang::select('kd_gol_obat as kode_golongan_obat', 'gol_obat as nama_golongan_obat', 'stsaktif as status')->where('gol_obat', 'like', '%' . $this->search . '%')->paginate(25);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_golongan_obat', 'nama_golongan_obat']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_golongan_obat', 'nama_golongan_obat']);
    }

    public function resetForm()
    {
        $this->kode_golongan_obat = null;
        $this->nama_golongan_obat = '';
    }

    public function store()
    {
        $this->validate([
            'nama_golongan_obat' => 'required|string|max:255',
        ]);

        $checkKodegolonganObat = GudanggolonganBarang::max('kd_gol_obat');
        if ($checkKodegolonganObat == null) {
            $this->kode_golongan_obat = 1;
        } else {
            $this->kode_golongan_obat = $checkKodegolonganObat + 1;
        }
        // dd($this->kode_golongan_obat, $this->nama_golongan_obat, $this->status_aktif);

        $golonganBarang = new GudanggolonganBarang;
        $golonganBarang->kd_gol_obat = $this->kode_golongan_obat;
        $golonganBarang->gol_obat = $this->nama_golongan_obat;
        $golonganBarang->stsaktif = $this->status_aktif;
        $golonganBarang->save();
        session()->flash('message', 'golongan-obat created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $golonganBarang = GudanggolonganBarang::where('kd_gol_obat', $id)->first();
        if ($golonganBarang) {
            $this->kode_golongan_obat = $golonganBarang->kd_gol_obat;
            $this->nama_golongan_obat = $golonganBarang->gol_obat;
            $this->status_aktif = $golonganBarang->stsaktif;
        } else {
            session()->flash('error', 'golongan-obat not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_golongan_obat' => 'required|string|max:255',
        ]);

        $golonganBarang = GudanggolonganBarang::where('kd_gol_obat', $id)->first();
        if ($golonganBarang) {
            $golonganBarang->gol_obat = $this->nama_golongan_obat;
            $golonganBarang->stsaktif = $this->status_aktif;
            $golonganBarang->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'golongan-obat updated successfully.');
        } else {
            session()->flash('error', 'golongan-obat not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_golongan_obat = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteJenisBarang()
    {
        $golonganBarang = GudanggolonganBarang::where('kd_gol_obat', $this->kode_golongan_obat)->first();
        $golonganBarang->delete();
        $this->dispatch('golonganBarangDeleted');
    }
}
