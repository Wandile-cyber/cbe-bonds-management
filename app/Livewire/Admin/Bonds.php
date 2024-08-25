<?php

namespace App\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Bond;

class Bonds extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.bonds', [
            'bonds' => Bond::orderBy('id', 'DESC')->paginate(10),
        ]);
    }
}