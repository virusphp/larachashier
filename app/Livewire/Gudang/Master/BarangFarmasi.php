<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\BarangFarmasi as GudangBarangFarmasi;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class BarangFarmasi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $filterJenisObat = null;
    public $filterStatusBarang = '1';
    public string $kode_barang;
    public string $nama_barang;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $barangFarmasis = $this->getbarangFarmasis();
        $jenisObat =  DB::table('jenis_obat')
            ->select('jns_obat as jenis_obat', 'kd_jns_obat as kode_jns_obat')
            ->where('stsaktif', 1)->get();
        return view('livewire.gudang.master.barang-farmasi', compact('barangFarmasis', 'jenisObat'));
    }

    public function getbarangFarmasis()
    {
        return GudangBarangFarmasi::from('barang_farmasi as bf')
            ->select(
                'bf.idx_barang as idx',
                'bf.kd_barang as kode_barang',
                'bf.nama_barang',
                'bf.kd_satuan_besar as satuan_besar',
                'bf.harga_satuan_besar',
                'bf.hrgsatbesarppn as harga_besar_ppn',
                'bf.isi_satuan_besar as isi',
                'bf.kd_satuan_kecil as satuan_kecil',
                'bf.harga_satuan_netto as harga_satuan_kecil',
                'bf.harga_satuan as harga_kecil_ppn',
                'bf.senpotbeli as potongan',
                'bf.harga_jual',
                'bf.generik',
                'bf.formularium',
                'bf.keterangan',
                'bf.kfa_code',
                'bf.nama_obat_virtual',
                'bf.nama_product_obat_actual',
                'bf.stsaktif'
            )
            ->when($this->filterJenisObat, function ($query) {
                $query->where('bf.kd_jns_obat', $this->filterJenisObat);
            })
            ->where('bf.stsaktif', $this->filterStatusBarang)
            ->where(function ($query) {
                if ($term = $this->search) {
                    if (strlen($term) > 3) {
                        $keywords = $term . "%";
                        return $query->where('bf.nama_barang', 'like', $keywords);
                    }
                }
            })->paginate(50);
        // dd($barangFarmasis);
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_barang', 'nama_barang']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_barang', 'nama_barang']);
    }

    public function resetForm()
    {
        $this->kode_barang = '';
        $this->nama_barang = '';
    }

    public function setKode()
    {
        $kodebarangFarmasi = "NW";
        $maxNo = GudangbarangFarmasi::where('kode_barang', 'like',  $kodebarangFarmasi . '%')->max('kode_barang');
        if (!$maxNo) {
            $noUrut = 1;
        } else {
            $noUrut = (int) substr($maxNo, -8);
            $noUrut++;
        }
        $autoNumber['autonumber'] = $kodebarangFarmasi . sprintf("%08s", $noUrut);
        return $autoNumber['autonumber'];
    }

    public function store()
    {
        $this->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $this->kode_barang = $this->setKode();

        $barangFarmasi = new GudangbarangFarmasi();
        $barangFarmasi->kd_barang = $this->kode_barang;
        $barangFarmasi->nama_barang = $this->nama_barang;
        $barangFarmasi->save();
        session()->flash('message', 'barangFarmasi created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $barangFarmasi = GudangbarangFarmasi::where('kd_barang', $id)->first();
        if ($barangFarmasi) {
            $this->kode_barang = $barangFarmasi->kd_barang;
            $this->nama_barang = $barangFarmasi->nama_barang;
        } else {
            session()->flash('error', 'barangFarmasi not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_barang' => 'required|string|max:255',
        ]);

        $barangFarmasi = GudangbarangFarmasi::where('kd_barang', $id)->first();
        if ($barangFarmasi) {
            $barangFarmasi->nama_barang = $this->nama_barang;
            $barangFarmasi->save();
            $this->resetForm();
            $this->isTableMode = true;
            session()->flash('message', 'barangFarmasi updated successfully.');
        } else {
            session()->flash('error', 'barangFarmasi not found.');
        }
    }

    public function deleteConfirmation($id)
    {
        $this->kode_barang = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteRak()
    {
        $barangFarmasi = GudangbarangFarmasi::where('kd_barang', $this->kode_barang)->first();
        $barangFarmasi->delete();
        $this->dispatch('barangFarmasiDeleted');
    }
}
