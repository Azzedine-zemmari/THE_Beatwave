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
        Schema::table('role_change_requests', function (Blueprint $table) {
            $table->dropColumn('requested_role');
        });
        Schema::table('role_change_requests',function(Blueprint $table){
            $table->enum('requested_role',['1','2'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_change_requests', function (Blueprint $table) {
            $table->dropColumn('requested_role');
        });
        Schema::table('role_change_requests',function(Blueprint $table){
            $table->enum('requested_role',['artist','organizer'])->nullable();
        });
    }
};
