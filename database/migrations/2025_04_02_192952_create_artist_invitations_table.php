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
        Schema::create('artist_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artistId')->constrained('users');
            $table->foreignId('organizerId')->constrained('users');
            $table->foreignId('eventsId')->constrained('events','eventId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_invitations');
    }
};
