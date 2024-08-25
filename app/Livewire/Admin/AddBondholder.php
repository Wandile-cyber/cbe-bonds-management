<?php

namespace App\Livewire\Admin;

use App\Models\BondHolder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddBondholder extends Component
{
    use LivewireAlert;

    public $bond;
    public $users;

    public $bh_holder_id;
    public $bh_bond_id;
    public $bh_auction_name;
    public $bh_security_name;
    public $bh_settlement_date;
    public $bh_maturity_date;
    public $bh_amount;
    public $bh_awarded_yield;
    public $bh_all_inclusive_price;
    public $bh_clean_price;
    public $bh_interest;
    public $bh_discount;
    public $bh_cost;
    public $bh_cost_for_clean_price;
    public $bh_accrued_interest;
    public $selected_bond;


    public function mount()
    {
        $this->bh_auction_name = $this->bond->issue_type;
        $this->bh_settlement_date = $this->bond->settlement_date;
        $this->bh_maturity_date = $this->bond->redemption_date;
        $this->bh_awarded_yield = $this->bond->coupon;
        $this->bh_interest = $this->bond->coupon;
        $this->bh_bond_id = $this->bond->id;
        $this->selected_bond = $this->bond->issue_type . ' ' . $this->bond->auction_date;

        $this->users = User::all();
    }

    public function save()
    {
        $newBond = new BondHolder();
        $newBond->user_id = Auth::user()->id;
        $newBond->holder_id = $this->bh_holder_id;
        $newBond->bond_id = $this->bh_bond_id;
        $newBond->auction_name = $this->bh_auction_name;
        $newBond->security_name = $this->bh_security_name;
        $newBond->settlement_date = $this->bh_settlement_date;
        $newBond->maturity_date = $this->bh_maturity_date;
        $newBond->amount = $this->bh_amount;
        $newBond->awarded_yield = $this->bh_awarded_yield;
        $newBond->all_inclusive_price = $this->bh_all_inclusive_price;
        $newBond->clean_price = $this->bh_clean_price;
        $newBond->interest = $this->bh_interest;
        $newBond->discount = $this->bh_discount;
        $newBond->cost = $this->bh_cost;
        $newBond->cost_for_clean_price = $this->bh_cost_for_clean_price;
        $newBond->accrued_interest = $this->bh_accrued_interest;
        $newBond->save();

        // $this->reset();
        $this->dispatch('bondHolderAdded');
        $this->alert('success', 'Bond holder has been saved successfully');
    }

    public function render()
    {
        return view('livewire.admin.add-bondholder');
    }
}