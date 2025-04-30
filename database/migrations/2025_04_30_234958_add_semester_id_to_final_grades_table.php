<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('final_grades', function (Blueprint $table) {
            $table->unsignedBigInteger('semester_id')->after('subject_id');
        });

        // Add foreign key constraint separately
        Schema::table('final_grades', function (Blueprint $table) {
            $table->foreign('semester_id')->references('semester_id')->on('semesters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('final_grades', function (Blueprint $table) {
            $table->dropForeign(['semester_id']);
            $table->dropColumn('semester_id');
        });
    }
};
