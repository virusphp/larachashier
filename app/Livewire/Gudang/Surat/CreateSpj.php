<?php

namespace App\Livewire\Gudang\Surat;

use Livewire\Component;

class CreateSpj extends Component
{
    public $search = '';
    public $no_spj;
    public $nama_spj;
    public $kode_suplier;
    public $tanggal_spj;
    public $status = 'draft';
    public $created_by;
    public $updated_by;
    public $listeners = [
        'spjCreated' => 'resetForm',
    ];

    public function mount()
    {
        $this->tanggal_spj = now()->format('d-m-Y');
        $lastSpj = \App\Models\Surat\ApSpjHeader::latest()->first();
        if ($lastSpj) {
            $this->no_spj = 'SPJ-' . str_pad((int) substr($lastSpj->no_spj, 4) + 1, 5, '0', STR_PAD_LEFT);
        } else {
            $this->no_spj = 'SPJ-00001';
        }
    }

    public function suplierDipilih(string $kode): void
    {
        $this->kode_suplier = $kode;
    }

    public function resetForm()
    {
        $this->reset([
            'no_spj',
            'nama_spj',
            'kode_suplier',
            'tanggal_spj',
            'status',
            'created_by',
            'updated_by',
        ]);
        $this->tanggal_spj = now()->format('d-m-Y');
    }

    public function submit()
    {
        $this->validate([
            'no_spj' => 'required|string|max:255',
            'nama_spj' => 'required|string|max:255',
            'kode_suplier' => 'required|string|max:255',
            'tanggal_spj' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        // Create the SPJ header
        \App\Models\Surat\ApSpjHeader::create([
            'no_spj' => $this->no_spj,
            'nama_spj' => $this->nama_spj,
            'kode_suplier' => $this->kode_suplier,
            'tanggal_spj' => $this->tanggal_spj,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        // Emit an event to notify that the SPJ has been created
        $this->emit('spjCreated');
    }

    public function render()
    {
        return view('livewire.gudang.surat.create-spj');
    }
}
