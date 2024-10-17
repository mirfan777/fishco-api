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
        Schema::create('aquaria', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aquarium');
            $table->float('ukuran_volume');
            $table->float('panjang');
            $table->float('lebar');
            $table->float('tinggi');
            $table->string('material');
            $table->string('tipe');
            $table->string('tipe_filter');
            $table->string('kapasitas_filter');
            $table->string('media_filter');
            $table->float('suhu_min');
            $table->float('suhu_max');
            $table->float('ph_min');
            $table->float('ph_max');
            $table->float('kekeruhan');
            $table->float('salinitas');
            $table->float('oksigen_terlarut');
            $table->float('hardness');
            $table->float('amonia');
            $table->float('nitrit');
            $table->float('nitrat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aquaria');
    }
};
