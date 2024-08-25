<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Bond;
use App\Models\BondHolder;
use Illuminate\Support\Facades\Auth;

class ViewBond extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'bondHolderAdded' => '$refresh',
        'newAction' => '$refresh',
    ];

    public $bond_id;
    public $bond_holders;

    public $bond;
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


    public function mount()
    {
        $this->bond_id = $this->bond_id;
        $bond = Bond::findOrFail($this->bond_id);
        $this->bond = $bond;

        $this->bond_calender_id = $bond->bond_calender_id;
        $this->quarter = $bond->quarter;
        $this->month = $bond->month;
        $this->issuer = $bond->issuer;
        $this->issue_type = $bond->issue_type;
        $this->amount = $bond->amount;
        $this->greenshoe_overallotment_option = $bond->greenshoe_overallotment_option;
        $this->procedure_for_bidding = $bond->procedure_for_bidding;
        $this->auction_date = $bond->auction_date;
        $this->settlement_date = $bond->settlement_date;
        $this->form_of_issuance = $bond->form_of_issuance;
        $this->auction_results = $bond->auction_results;
        $this->yield = $bond->yield;
        $this->minimum_bid_size = $bond->minimum_bid_size;
        $this->minimum_bid_size_individual = $bond->minimum_bid_size_individual;
        $this->interest_payment_date = $bond->interest_payment_date;
        $this->coupon = $bond->coupon;
        $this->day_count_convention = $bond->day_count_convention;
        $this->tax = $bond->tax;
        $this->currency = $bond->currency;
        $this->redemption_date = $bond->redemption_date;
        $this->listing = $bond->listing;
        $this->trading = $bond->trading;
        $this->defaulters = $bond->defaulters;
        $this->document_file = $bond->document_file;

        $this->bond_holders = BondHolder::with('holder')->where('bond_id', $this->bond_id)->get();
    }

    public function render()
    {
        return view('livewire.admin.view-bond');
    }

    public function removeHolder($id)
    {
        BondHolder::where('id', $id)->delete();
        $this->dispatch('newAction');
        $this->alert('success', 'Bond holder has been removed successfully');
    }

    public function updateBond()
    {
        $current_bond =  Bond::findOrFail($this->bond_id);
        $current_bond->user_id = Auth::user()->id;
        $current_bond->bond_calender_id = $this->bond_calender_id;
        $current_bond->quarter = $this->quarter;
        $current_bond->month = $this->month;
        $current_bond->issuer = $this->issuer;
        $current_bond->issue_type = $this->issue_type;
        $current_bond->amount = $this->amount;
        $current_bond->greenshoe_overallotment_option = $this->greenshoe_overallotment_option;
        $current_bond->procedure_for_bidding = $this->procedure_for_bidding;
        $current_bond->auction_date = $this->auction_date;
        $current_bond->settlement_date = $this->settlement_date;
        $current_bond->form_of_issuance = $this->form_of_issuance;
        $current_bond->auction_results = $this->auction_results;
        $current_bond->yield = $this->yield;
        $current_bond->minimum_bid_size = $this->minimum_bid_size;
        $current_bond->minimum_bid_size_individual = $this->minimum_bid_size_individual;
        $current_bond->interest_payment_date = $this->interest_payment_date;
        $current_bond->coupon = $this->coupon;
        $current_bond->day_count_convention = $this->day_count_convention;
        $current_bond->tax = $this->tax;
        $current_bond->currency = $this->currency;
        $current_bond->redemption_date = $this->redemption_date;
        $current_bond->listing = $this->listing;
        $current_bond->trading = $this->trading;
        $current_bond->defaulters = $this->defaulters;
        $current_bond->document_file = $this->document_file;
        $current_bond->save();

        $this->alert('success', 'Bond details has been updated successfully');
    }
}