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
        Schema::create('caregiver_specialities', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('caregiver_id');
            $table->unsignedBigInteger('speciality_id');

            $table->foreign('caregiver_id')->references('id')->on('users');
            $table->foreign('speciality_id')->references('id')->on('specialities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregiver_specialities');
    }
};
