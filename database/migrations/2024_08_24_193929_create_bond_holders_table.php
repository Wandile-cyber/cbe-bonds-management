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
        Schema::create('bond_holders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('holder_id')->nullable();
            $table->string('bond_id')->nullable();
            $table->string('auction_name')->nullable();
            $table->string('security_name')->nullable();
            $table->string('settlement_date')->nullable();
            $table->string('maturity_date')->nullable();
            $table->string('amount')->nullable();
            $table->string('awarded_yield')->nullable();
            $table->string('all_inclusive_price')->nullable();
            $table->string('clean_price')->nullable();
            $table->string('interest')->nullable();
            $table->string('discount')->nullable();
            $table->string('cost')->nullable();
            $table->string('cost_for_clean_price')->nullable();
            $table->string('accrued_interest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bond_holders');
    }
};
