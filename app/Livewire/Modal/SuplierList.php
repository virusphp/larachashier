<?php

namespace App\Livewire\Modal;

use App\Models\Gudang\Suplier;
use LivewireUI\Modal\ModalComponent;

class SuplierList extends ModalComponent
{
    public string $search = '';
    public $title = 'Pilih Suplier';

    public function render()
    {
        logger('Render berjalan, search: ' . $this->search . ', title: ' . $this->title);
        $supliers = Suplier::query()
            ->select('kdsuplier as kode_suplier', 'nmsuplier as nama_suplier', 'alamat', 'telpon')
            ->when(strlen($this->search) > 0, function ($query) {
                $query->where(function ($q) {
                    $q->where('kdsuplier', 'like', '%' . $this->search . '%')
                        ->orWhere('nmsuplier', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('nmsuplier')
            ->get();

        return view('livewire.modal.suplier-list', [
            'supliers' => $supliers,
        ]);
    }

    public function selectSuplier($kode)
    {
        $this->dispatch('suplierDipilih', $kode);
        $this->closeModal();
    }
}
