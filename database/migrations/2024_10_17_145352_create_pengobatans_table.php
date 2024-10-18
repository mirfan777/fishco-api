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
        Schema::create('pengobatans', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name');
            $table->string('medicine_description');
            $table->foreignId('penyakit_id');
            $table->foreignId('ikan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengobatans');
    }
};
