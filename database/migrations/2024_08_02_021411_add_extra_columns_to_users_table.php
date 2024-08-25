<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_number')->nullable()->after('email_verified_at');
            $table->string('nationality')->nullable()->after('id_number');
            $table->string('next_of_kin')->nullable()->after('nationality');
            $table->string('next_of_kin_telephone')->nullable()->after('next_of_kin');
            $table->string('postal_address')->nullable()->after('next_of_kin_telephone');
            $table->string('telephone')->nullable()->after('postal_address');
            $table->string('cellphone')->nullable()->after('telephone');
            $table->string('fax')->nullable()->after('cellphone');
            $table->string('occupation')->nullable()->after('fax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_number', 'nationality', 'next_of_kin', 'next_of_kin_telephone', 'postal_address', 'telephone', 'cellphone', 'fax', 'occupation']);
        });
    }
};