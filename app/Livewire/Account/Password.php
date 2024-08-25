<?php

namespace App\Livewire\Account;

use Livewire\Attributes\Validate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Password extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $current_password;

    #[Validate('required')]
    public $new_password;

    #[Validate('required|same:new_password')]
    public $confirm_password;

    public function updatePassword()
    {
        $this->validate();

        $user = User::where('id', auth()->user()->id)->first();
        if (!Hash::check($this->current_password, $user->password)) {
            $this->alert('error', 'Current password is incorrect');
            return;
        }
        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->reset(['current_password', 'new_password', 'confirm_password']);

        $this->alert('success', 'Password updated successfully');
    }

    public function render()
    {
        return view('livewire.account.password');
    }
}