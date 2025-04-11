<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop the user_role_user table if it exists
        Schema::dropIfExists('user_role_user');
    }

    public function down(): void
    {
        // Recreate the user_role_user table if needed
        Schema::create('user_role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_role_id')->constrained('user_roles')->onDelete('cascade');
            $table->timestamps();
        });
    }
};
