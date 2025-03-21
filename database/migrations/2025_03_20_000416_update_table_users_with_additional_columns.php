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
            $table->renameColumn('name','Firstname');
            $table->string('LastName');
            $table->string('role')->default('user');
            $table->string('avatar')->nullable();
            $table->string('bio')->nullable();
            $table->string('facebookLink')->nullable();
            $table->string('instagramLink')->nullable();
            $table->string('websiteLink')->nullable();
            $table->string('businessMail')->nullable();
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
