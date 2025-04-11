<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('class_works', function (Blueprint $table) {
            $table->string('class_work_title')->after('class_work_id');
        });
    }

    public function down(): void
    {
        Schema::table('class_works', function (Blueprint $table) {
            $table->dropColumn('class_work_title');
        });
    }
};
