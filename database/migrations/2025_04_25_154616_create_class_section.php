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
        Schema::create('class_section', function (Blueprint $table) {
            $table->id("class_section_id");
            $table->string("class_section_name");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("academic_year_id");
            $table->unsignedBigInteger("subject_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");

            $table->foreign("academic_year_id")->references("academic_year_id")->on("academic_year")->onDelete("cascade");

            $table->foreign("subject_id")->references("subject_id")->on("subjects")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_section');
    }
};
