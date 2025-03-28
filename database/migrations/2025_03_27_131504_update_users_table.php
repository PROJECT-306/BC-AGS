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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("name");

            $table->string("first_name", 255)->after("id");
            $table->string("middle_name", 255)->after("first_name");
            $table->string("last_name", 255)->after("middle_name");
            $table->unsignedBigInteger("user_role_id")->after("last_name");

            $table->foreign("user_role_id")->references("user_role_id")->on("user_roles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("name", 255)->after("id");

            $table->dropForeign(["user_role_id"]);
            $table->dropColumn(["first_name", "middle_name", "last_name", "user_role_id"]);
        });
    }
};
