<?php

namespace App\Livewire\Account;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\BankAccount;
use Livewire\Component;

class Bankedit extends Component
{
    use LivewireAlert;

    public $account;

    public $bank_name;
    public $branch_name;
    public $branch_code;
    public $account_number;

    public function mount()
    {
        $this->bank_name = $this->account->bank_name;
        $this->branch_name = $this->account->branch_name;
        $this->branch_code = $this->account->branch_code;
        $this->account_number = $this->account->account_number;
    }

    public function updateAccount()
    {

        $row_bank = BankAccount::where('id', $this->account->id)->first();
        $row_bank->user_id = auth()->user()->id;
        $row_bank->bank_name = $this->bank_name;
        $row_bank->branch_name = $this->branch_name;
        $row_bank->branch_code = $this->branch_code;
        $row_bank->account_number = $this->account_number;
        $row_bank->save();

        $this->reset(['bank_name', 'branch_name', 'branch_code', 'account_number']);

        $this->alert('success', 'Bank account updated successfully');

        $this->dispatch('bankAccountUpdated');
    }

    public function removeAccount()
    {
        $this->account->delete();

        $this->alert('success', 'Bank account deleted successfully');

        $this->dispatch('bankAccountUpdated');
    }

    public function render()
    {
        return view('livewire.account.bankedit');
    }
}