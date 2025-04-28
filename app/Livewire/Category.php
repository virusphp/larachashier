<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(2);
        return view('livewire.category', compact('users'));
    }
}
