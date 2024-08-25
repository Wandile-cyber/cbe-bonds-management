<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bonds', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('bond_calender_id')->nullable();
            $table->string('quarter')->nullable();
            $table->string('month')->nullable();
            $table->string('issuer')->nullable();
            $table->string('issue_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('greenshoe_overallotment_option')->nullable();
            $table->string('procedure_for_bidding')->nullable();
            $table->string('auction_date')->nullable();
            $table->string('settlement_date')->nullable();
            $table->string('form_of_issuance')->nullable();
            $table->string('auction_results')->nullable();
            $table->string('yield')->nullable();
            $table->string('minimum_bid_size')->nullable();
            $table->string('minimum_bid_size_individual')->nullable();
            $table->string('interest_payment_date')->nullable();
            $table->string('coupon')->nullable();
            $table->string('day_count_convention')->nullable();
            $table->string('tax')->nullable();
            $table->string('currency')->nullable();
            $table->string('redemption_date')->nullable();
            $table->string('listing')->nullable();
            $table->string('trading')->nullable();
            $table->string('defaulters')->nullable();
            $table->string('document_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonds');
    }
};