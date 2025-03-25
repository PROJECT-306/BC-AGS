<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grading_periods', function (Blueprint $table) {
            $table->id('grading_period_id');
            $table->string('grading_period_name')->unique(); // Prelim, Midterm, Pre-final, Final
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grading_periods');
    }
};
