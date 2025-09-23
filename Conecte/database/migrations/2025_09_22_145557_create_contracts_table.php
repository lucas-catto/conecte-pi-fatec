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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            
            $table->date('date_start');
            $table->date('date_end');

            $table->unsignedBigInteger('caregiver_id');
            $table->unsignedBigInteger('contractor_id');

            $table->foreign('caregiver_id')->references('id')->on('caregivers');
            $table->foreign('contractor_id')->references('id')->on('contractors');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
