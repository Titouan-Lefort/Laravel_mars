<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Biome extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'surface_type',
        'temperature_min',
        'temperature_max',
        'humidity',
        'radiation_level',
        'atmospheric_pressure',
        'altitude',
    ];

    public function registres(): HasMany
    {
        return $this->hasMany(Registre::class);
    }
}
