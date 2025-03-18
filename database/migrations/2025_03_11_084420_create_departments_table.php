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
        if (!Schema::hasTable('departments')) {
            Schema::create('departments', function (Blueprint $table) {
                $table->id('department_id'); // Primary Key
                $table->string('department_name')->unique();
                $table->string('department_code')->nullable();
                $table->timestamp('department_date_added')->useCurrent();
                $table->timestamp('department_date_modified')->useCurrent()->useCurrentOnUpdate();
                $table->boolean('department_is_deleted')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
