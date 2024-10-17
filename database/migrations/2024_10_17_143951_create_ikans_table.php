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
        Schema::create('ikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ikan');
            $table->string('kingdom');
            $table->string('filum');
            $table->string('kelas');
            $table->string('ordo');
            $table->string('famili');
            $table->string('genus');
            $table->string('spesies');
            $table->string('warna');
            $table->string('jenis_makananan');
            $table->string('makananan');
            $table->float('suhu_min');
            $table->float('suhu_max');
            $table->float('ph_min');
            $table->float('ph_max');
            $table->string('habitat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikans');
    }
};
