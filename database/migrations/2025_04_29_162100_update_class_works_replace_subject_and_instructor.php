<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('class_works', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['subject_id']);
            $table->dropForeign(['instructor_id']);

            // Then drop the columns
            $table->dropColumn(['subject_id', 'instructor_id']);

            // Add the new column
            $table->unsignedBigInteger('class_section_id')->after('class_work_id');

            // Add the new foreign key
            $table->foreign('class_section_id')
                ->references('class_section_id')
                ->on('class_section') // or 'class_section' if that's your table name
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('class_works', function (Blueprint $table) {
            // Drop the new column and foreign key
            $table->dropForeign(['class_section_id']);
            $table->dropColumn('class_section_id');

            // Re-add old columns
            $table->unsignedBigInteger('subject_id')->after('class_work_id');
            $table->unsignedBigInteger('instructor_id')->after('subject_id');

            // Re-add foreign keys
            $table->foreign('subject_id')
                ->references('subject_id')
                ->on('subjects')
                ->onDelete('cascade');

            $table->foreign('instructor_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }
};
