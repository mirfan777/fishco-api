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
        Schema::create('aquariums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->float('volume_size');
            $table->float('length');
            $table->float('width');
            $table->float('height');
            $table->string('material');
            $table->string('type');
            $table->string('filter_type');
            $table->string('filter_capacity');
            $table->string('filter_media');
            $table->float('min_temperature');
            $table->float('max_temperature');
            $table->float('min_ph');
            $table->float('max_ph');
            $table->float('turbidity');
            $table->float('salinity');
            $table->float('disolved_oxygen');
            $table->float('hardness');
            $table->float('amonia');
            $table->float('nitrite');
            $table->float('nitrate');
            $table->timestamps();
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
