<?php

namespace App\Livewire\Bonds;

use App\Models\BondCalendar;
use Livewire\Component;

class Calender extends Component
{
    public $bonds;

    public function mount()
    {
        $this->bonds = BondCalendar::get();
    }
    public function render()
    {
        return view('livewire.bonds.calender');
    }
}