<?php

namespace App\Http\Controllers;

use App\Models\Biome;
use Illuminate\Http\Request;

class BiomeController extends Controller
{
    public function index()
    {
        $biomes = Biome::orderBy('id')->get();
        return view('biomes.index', compact('biomes'));
    }
}
