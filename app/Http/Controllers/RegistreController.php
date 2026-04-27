<?php

namespace App\Http\Controllers;

use App\Models\Biome;
use App\Models\Registre;
use Illuminate\View\View;

class RegistreController extends Controller
{
    public function index(): View
    {
        $registres = Registre::with('biome')->latest()->get();

        $stats = [
            'total_registres' => $registres->count(),
            'total_biomes' => Biome::count(),
            'rh_plus' => $registres->where('rh_factor', 'Rh+')->count(),
            'rh_minus' => $registres->where('rh_factor', 'Rh-')->count(),
            'avg_accreditation' => $registres->count() > 0
                ? round($registres->avg(fn (Registre $registre) => (int) $registre->accreditation_level), 2)
                : 0,
        ];

        return view('registre.index', [
            'registres' => $registres,
            'stats' => $stats,
        ]);
    }
}
