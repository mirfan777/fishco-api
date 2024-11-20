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
            $table->foreign('fish_id')->references('id')->on('fishes')->onDelete('cascade');
            $table->integer('quantity');
            $table->unsignedBigInteger('aquarium_id');
            $table->foreign('aquarium_id')->references('id')->on('aquariums')->onDelete('cascade');
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
