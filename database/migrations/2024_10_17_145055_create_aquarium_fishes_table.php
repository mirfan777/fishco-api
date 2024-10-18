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
        Schema::create('aquarium_fishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fish_id');
            $table->foreign('fish_id')->references('id')->on('fishes');
            $table->unsignedBigInteger('aquarium_id');
            $table->foreign('aquarium_id')->references('id')->on('aquarium');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aquarium_fishes');
    }
};
