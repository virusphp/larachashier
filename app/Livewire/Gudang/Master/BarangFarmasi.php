<?php

namespace App\Livewire\Gudang\Master;

use App\Models\Gudang\BarangFarmasi as GudangBarangFarmasi;
use Livewire\Component;
use Livewire\WithPagination;

class BarangFarmasi extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;
    public $search = '';
    public $kode_barangFarmasi;
    public string $nama_barangFarmasi;
    public string $alamat;
    public $telepon;
    public $nama_detail;
    public array $type_barangFarmasi = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $barangFarmasis = $this->getbarangFarmasis();
        return view('livewire.gudang.master.barang-farmasi', compact('barangFarmasis'));
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
            // ->distinct()
            // ->join('ap_belistok as bs', 'bf.kd_barang', 'bs.kd_barang')
            ->where('bf.kd_jns_obat', '=', $jenis_obat)
            ->where('bf.stsaktif', $status_barang)
            ->where(function ($query) use ($request) {
                if ($term = $request->term) {
                    if (strlen($term) > 3) {
                        $keywords = $term . "%";
                        return $query->where('bf.nama_barang', 'like', $keywords);
                    }
                }
            })
    }

    public function createMode()
    {
        $this->isTableMode = false;
        $this->reset(['kode_barangFarmasi', 'nama_barangFarmasi', 'alamat', 'telepon', 'nama_detail', 'type_barangFarmasi']);
    }

    public function tableMode()
    {
        $this->isTableMode = true;
        $this->reset(['kode_barangFarmasi', 'nama_barangFarmasi', 'alamat', 'telepon', 'nama_detail', 'type_barangFarmasi']);
    }

    public function resetForm()
    {
        $this->kode_barangFarmasi = null;
        $this->nama_barangFarmasi = '';
    }

    public function setKode()
    {
        $kodebarangFarmasi = "SPL";
        $maxNo = GudangbarangFarmasi::where('kdbarangFarmasi', 'like',  $kodebarangFarmasi . '%')->max('kdbarangFarmasi');
        if (!$maxNo) {
            $noUrut = 1;
        } else {
            $noUrut = (int) substr($maxNo, -3);
            $noUrut++;
        }
        $autoNumber['autonumber'] = $kodebarangFarmasi . sprintf("%03s", $noUrut);
        return $autoNumber['autonumber'];
    }

    public function store()
    {
        $this->validate([
            'nama_barangFarmasi' => 'required|string|max:255',
            'nama_detail' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        $this->kode_barangFarmasi = $this->setKode();

        $barangFarmasi = new GudangbarangFarmasi();
        $barangFarmasi->kdbarangFarmasi = $this->kode_barangFarmasi;
        $barangFarmasi->nmbarangFarmasi = $this->nama_barangFarmasi;
        $barangFarmasi->alamat = $this->alamat;
        $barangFarmasi->telpon = $this->telepon;
        $barangFarmasi->nama_detail = $this->nama_detail;
        $barangFarmasi->type_barangFarmasi = count($this->type_barangFarmasi) > 0 ? implode(',', $this->type_barangFarmasi) : $this->type_barangFarmasi;
        $barangFarmasi->save();
        session()->flash('message', 'barangFarmasi created successfully.');

        $this->resetForm();
        $this->isTableMode = true;
    }

    public function edit($id)
    {
        $this->isTableMode = false;
        $barangFarmasi = GudangbarangFarmasi::where('kdbarangFarmasi', $id)->first();
        if ($barangFarmasi) {
            $this->kode_barangFarmasi = $barangFarmasi->kdbarangFarmasi;
            $this->nama_barangFarmasi = $barangFarmasi->nmbarangFarmasi;
            $this->alamat = $barangFarmasi->alamat;
            $this->telepon = $barangFarmasi->telpon;
            $this->nama_detail = $barangFarmasi->nama_detail;
            $this->type_barangFarmasi = $barangFarmasi->type_barangFarmasi;
        } else {
            session()->flash('error', 'barangFarmasi not found.');
        }
    }

    public function update($id)
    {
        $this->validate([
            'nama_barangFarmasi' => 'required|string|max:255',
            'nama_detail' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telpon' => 'required|string|max:255',
            'type_barangFarmasi' => 'required|string|max:255',
        ]);

        $barangFarmasi = GudangbarangFarmasi::where('kdbarangFarmasi', $id)->first();
        if ($barangFarmasi) {
            $barangFarmasi->nmbarangFarmasi = $this->nama_barangFarmasi;
            $barangFarmasi->alamat = $this->alamat;
            $barangFarmasi->telpon = $this->telepon;
            $barangFarmasi->nama_detail = $this->nama_detail;
            $barangFarmasi->type_barangFarmasi = $this->type_barangFarmasi;
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
        $this->kode_barangFarmasi = $id;
        $this->dispatch('show-delete-confirmation');
    }

    #[On('deleteConfirmed')]
    public function deleteRak()
    {
        $barangFarmasi = GudangbarangFarmasi::where('kdbarangFarmasi', $this->kode_barangFarmasi)->first();
        $barangFarmasi->delete();
        $this->dispatch('barangFarmasiDeleted');
    }
}
