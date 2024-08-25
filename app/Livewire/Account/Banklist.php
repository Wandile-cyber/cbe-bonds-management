<?php

namespace App\Livewire\Account;

use Livewire\Component;

class Banklist extends Component
{
    protected $listeners = [
        'bankAccountUpdated' => '$refresh',
        'bankAccountAdded' => '$refresh',
    ];

    public $bank_accounts;

    public function mount()
    {
        $this->bank_accounts = auth()->user()->bank_accounts;
    }

    public function render()
    {
        return view('livewire.account.banklist');
    }
}