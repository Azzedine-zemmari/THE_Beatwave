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
        Schema::create('events', function (Blueprint $table) {
            $table->id('eventId');
            $table->string('nom');
            $table->text('description');
            $table->timestamp('date');
            $table->float('taketPrice');
            $table->integer('stockeTicket');
            $table->integer('numberOfPlace');
            $table->string('image');
            $table->foreignId('artistId')->constrained('users');
            $table->foreignId('categorieId')->constrained('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
