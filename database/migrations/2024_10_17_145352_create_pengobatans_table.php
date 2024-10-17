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
            $table->string('nama_pengoobat');
            $table->string('deskripsi_pengoobat');
            $table->foreignId('id_penyakit');
            $table->foreignId('id_ikan');
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
