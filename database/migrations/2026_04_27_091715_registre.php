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
        Schema::create('registre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biome_id')->constrained('biomes')->cascadeOnDelete();
            $table->enum('rh_factor', ['Rh+', 'Rh-']);
            $table->enum('accreditation_level', ['1', '2', '3', '4', '5']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registre');
    }
};
