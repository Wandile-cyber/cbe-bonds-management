<?php

namespace App\Livewire\Account;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\BankAccount;
use Livewire\Component;

class Bank extends Component
{

    use LivewireAlert;

    public $bank_name;
    public $branch_name;
    public $branch_code;
    public $account_number;

    protected $rules = [
        'bank_name' => 'required|string',
        'branch_name' => 'required|string',
        'branch_code' => 'required|string',
        'account_number' => 'required|numeric',
    ];

    public function addBankAccount()
    {
        $this->validate();

        $new_bank = new BankAccount();
        $new_bank->user_id = auth()->user()->id;
        $new_bank->bank_name = $this->bank_name;
        $new_bank->branch_name = $this->branch_name;
        $new_bank->branch_code = $this->branch_code;
        $new_bank->account_number = $this->account_number;
        $new_bank->save();

        $this->reset(['bank_name', 'branch_name', 'branch_code', 'account_number']);

        $this->alert('success', 'Bank account saved successfully');

        $this->dispatch('bankAccountAdded');
    }

    public function render()
    {
        return view('livewire.account.bank');
    }
}