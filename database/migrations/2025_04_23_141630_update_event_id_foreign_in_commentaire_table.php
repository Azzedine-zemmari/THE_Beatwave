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
        Schema::table('commentaire', function (Blueprint $table) {
            $table->dropForeign(['eventId']);
            $table->foreign('eventId')->references('eventId')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaire', function (Blueprint $table) {
            //
        });
    }
};
