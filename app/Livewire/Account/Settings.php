<?php

namespace App\Livewire\Account;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use App\Models\User;
use Livewire\Component;

class Settings extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $id_number;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $email;

    public $nationality;
    public $next_of_kin;
    public $next_of_kin_telephone;
    public $postal_address;
    public $telephone;
    public $cellphone;
    public $fax;
    public $occupation;
    public $email_verified = false;

    public function mount(): void
    {
        $this->id_number = auth()->user()->id_number;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->nationality = auth()->user()->nationality;
        $this->next_of_kin = auth()->user()->next_of_kin;
        $this->next_of_kin_telephone = auth()->user()->next_of_kin_telephone;
        $this->postal_address = auth()->user()->postal_address;
        $this->telephone = auth()->user()->telephone;
        $this->cellphone = auth()->user()->cellphone;
        $this->fax = auth()->user()->fax;
        $this->occupation = auth()->user()->occupation;
        $this->email_verified = auth()->user()->email_verified;
    }

    public function updateAccount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->nationality = $this->nationality;
        $user->next_of_kin = $this->next_of_kin;
        $user->next_of_kin_telephone = $this->next_of_kin_telephone;
        $user->postal_address = $this->postal_address;
        $user->telephone = $this->telephone;
        $user->cellphone = $this->cellphone;
        $user->fax = $this->fax;
        $user->occupation = $this->occupation;
        $user->save();

        $this->alert('success', 'Profile account updated successfully');

        $this->dispatch('profileUpdated');
    }


    public function render()
    {
        return view('livewire.account.settings');
    }
}