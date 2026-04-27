<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registre extends Model
{
    use HasFactory;

    protected $table = 'registre';

    protected $fillable = [
        'biome_id',
        'rh_factor',
        'accreditation_level',
    ];

    public function biome(): BelongsTo
    {
        return $this->belongsTo(Biome::class);
    }
}
