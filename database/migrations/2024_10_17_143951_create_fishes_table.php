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
        Schema::create('fishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kingdom');
            $table->string('phylum');
            $table->string('class');
            $table->string('order');
            $table->string('family');
            $table->string('genus');
            $table->string('species');
            $table->string('colour');
            $table->string('food_type'); // 1.carnivore 2.herbivore 3.omnivore
            $table->string('food');
            $table->float('min_temperature');
            $table->float('max_temperature');
            $table->float('min_ph');
            $table->float('max_ph');
            $table->float('min_salinity');
            $table->float('max_salinity');
            $table->integer('venomous')->default(0);
            $table->integer('poisonous')->default(0);
            $table->string('habitat'); // 1.freshwater 2.saltwater 3.brackish
            $table->string('overview');
            $table->string('thumbnail');
            $table->float('average_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fishes');
    }
};
