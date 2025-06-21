<?php

namespace App\Livewire\Gudang\Surat;

use Livewire\Component;
use Livewire\WithPagination;

class Spj extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public bool $isTableMode = true;


    public function render()
    {
        return view('livewire.gudang.surat.spj');
    }
}
