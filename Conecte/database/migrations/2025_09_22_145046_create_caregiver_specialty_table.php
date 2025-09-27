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
        Schema::create('caregiver_specialty', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('caregiver_id');
            $table->unsignedBigInteger('specialty_id');

            $table->foreign('caregiver_id')->references('id')->on('caregivers');
            $table->foreign('specialty_id')->references('id')->on('specialties');

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
