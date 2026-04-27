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
        Schema::create('biomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('surface_type'); // rocky, sandy, icy, volcanic, ...
            $table->decimal('temperature_min', 6, 2); // °C
            $table->decimal('temperature_max', 6, 2); // °C
            $table->decimal('humidity', 5, 2)->default(0); // %
            $table->decimal('radiation_level', 8, 4)->default(0); // mSv/day
            $table->decimal('atmospheric_pressure', 8, 4)->nullable(); // hPa
            $table->decimal('altitude', 8, 2)->nullable(); // mètres
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biomes');
    }
};
