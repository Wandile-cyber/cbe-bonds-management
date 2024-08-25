<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Bond;
use Illuminate\Support\Facades\Auth;

class AddBond extends Component
{
    use LivewireAlert;

    public $bond_calender_id;
    public $quarter;
    public $month;
    public $issuer;
    public $issue_type;
    public $amount;
    public $greenshoe_overallotment_option;
    public $procedure_for_bidding;
    public $auction_date;
    public $settlement_date;
    public $form_of_issuance;
    public $auction_results;
    public $yield;
    public $minimum_bid_size;
    public $minimum_bid_size_individual;
    public $interest_payment_date;
    public $coupon;
    public $day_count_convention;
    public $tax;
    public $currency;
    public $redemption_date;
    public $listing;
    public $trading;
    public $defaulters;
    public $document_file;

    public function createBond()
    {
        $this->validate([
            'bond_calender_id' => 'nullable|string',
            'quarter' => 'nullable|string',
            'month' => 'nullable|string',
            'issuer' => 'nullable|string',
            'issue_type' => 'nullable|string',
            'amount' => 'nullable|string',
            'greenshoe_overallotment_option' => 'nullable|string',
            'procedure_for_bidding' => 'nullable|string',
            'auction_date' => 'nullable|string',
            'settlement_date' => 'nullable|string',
            'form_of_issuance' => 'nullable|string',
            'auction_results' => 'nullable|string',
            'yield' => 'nullable|string',
            'minimum_bid_size' => 'nullable|string',
            'interest_payment_date' => 'nullable|string',
            'coupon' => 'nullable|string',
            'day_count_convention' => 'nullable|string',
            'tax' => 'nullable|string',
            'currency' => 'nullable|string',
            'redemption_date' => 'nullable|string',
            'listing' => 'nullable|string',
            'trading' => 'nullable|string',
            'defaulters' => 'nullable|string',
            'document_file' => 'nullable|string',
        ]);

        $new_bond = new Bond();
        $new_bond->user_id = Auth::user()->id;
        $new_bond->bond_calender_id = $this->bond_calender_id;
        $new_bond->quarter = $this->quarter;
        $new_bond->month = $this->month;
        $new_bond->issuer = $this->issuer;
        $new_bond->issue_type = $this->issue_type;
        $new_bond->amount = $this->amount;
        $new_bond->greenshoe_overallotment_option = $this->greenshoe_overallotment_option;
        $new_bond->procedure_for_bidding = $this->procedure_for_bidding;
        $new_bond->auction_date = $this->auction_date;
        $new_bond->settlement_date = $this->settlement_date;
        $new_bond->form_of_issuance = $this->form_of_issuance;
        $new_bond->auction_results = $this->auction_results;
        $new_bond->yield = $this->yield;
        $new_bond->minimum_bid_size = $this->minimum_bid_size;
        $new_bond->minimum_bid_size_individual = $this->minimum_bid_size_individual;
        $new_bond->interest_payment_date = $this->interest_payment_date;
        $new_bond->coupon = $this->coupon;
        $new_bond->day_count_convention = $this->day_count_convention;
        $new_bond->tax = $this->tax;
        $new_bond->currency = $this->currency;
        $new_bond->redemption_date = $this->redemption_date;
        $new_bond->listing = $this->listing;
        $new_bond->trading = $this->trading;
        $new_bond->defaulters = $this->defaulters;
        $new_bond->document_file = $this->document_file;
        $new_bond->save();

        $this->reset();
        $this->alert('success', 'Bond has been saved successfully');

        $this->dispatch('bondAdded');
    }

    public function render()
    {
        return view('livewire.admin.add-bond');
    }
}
