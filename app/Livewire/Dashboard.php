<?php

namespace App\Livewire;

use App\Models\BondHolder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $bonds;

    public function mount()
    {
        $this->bonds = BondHolder::with('holder')->where('holder_id', Auth::user()->id)->orderBy('id', 'ASC')->get();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}