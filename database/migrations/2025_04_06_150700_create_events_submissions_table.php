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
        Schema::create('events_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizerId')->constrained('users');
            $table->foreignId('artistId')->constrained('users');
            $table->foreignId('eventId')->constrained('events','eventId');
            $table->enum('status',['accept','pending','refuse'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_submissions');
    }
};
