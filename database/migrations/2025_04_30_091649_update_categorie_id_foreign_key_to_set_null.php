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
        Schema::table('events', function (Blueprint $table) {
            // to change the categorieId null before set null to accept null value
            $table->unsignedBigInteger('categorieId')->nullable()->change();
            $table->dropForeign(['categorieId']);
            $table->foreign('categorieId')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('categorieId')->nullable(false)->change();
            $table->dropForeign(['categorieId']);
            $table->foreign('categorieId')->references('id')->on('categories');
        });
    }
};
