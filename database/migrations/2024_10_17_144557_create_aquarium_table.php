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
            $table->float('volume_size')->nullable();
            $table->string('type')->nullable();
            $table->string('filter_type')->nullable();
            $table->string('filter_capacity')->nullable();
            $table->string('filter_media')->nullable();
            $table->float('min_temperature')->nullable();
            $table->float('max_temperature')->nullable();
            $table->float('min_ph')->nullable();
            $table->float('max_ph')->nullable();
            $table->float('turbidity')->nullable();
            $table->float('salinity')->nullable();
            $table->float('disolved_oxygen')->nullable();
            $table->float('hardness')->nullable();
            $table->float('amonia')->nullable();
            $table->float('nitrite')->nullable();
            $table->float('nitrate')->nullable();
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
