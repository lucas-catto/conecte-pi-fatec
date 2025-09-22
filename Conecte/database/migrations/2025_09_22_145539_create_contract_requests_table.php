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
        Schema::create('contract_requests', function (Blueprint $table) {
            $table->id();

            $table->string('contractor_description');
            $table->string('caregiver_response')->null();

            $table->enum('accepted', ['yes', 'no'])->default('no');

            $table->unsignedBigInteger('caregiver_id');
            $table->unsignedBigInteger('contractor_id');

            $table->foreign('caregiver_id')->references('id')->on('users');
            $table->foreign('contractor_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_requests');
    }
};
