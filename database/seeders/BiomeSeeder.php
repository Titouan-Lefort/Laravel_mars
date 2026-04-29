<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BiomeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('biomes')->insert([
            [
                'name' => 'Ares Vallis',
                'description' => 'Zone rocheuse avec canyon ancien.',
                'surface_type' => 'rocky',
                'temperature_min' => -65,
                'temperature_max' => 5,
                'humidity' => 10,
                'radiation_level' => 0.23,
                'atmospheric_pressure' => 6.1,
                'altitude' => -2400,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Planum Boreum',
                'description' => 'Region polaire froide et glacee.',
                'surface_type' => 'icy',
                'temperature_min' => -125,
                'temperature_max' => -15,
                'humidity' => 25,
                'radiation_level' => 0.15,
                'atmospheric_pressure' => 7.2,
                'altitude' => 1200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Valles Marineris',
                'description' => 'Le plus grand canyon du systeme solaire. Vents violents.',
                'surface_type' => 'canyon',
                'temperature_min' => -50,
                'temperature_max' => 20,
                'humidity' => 5,
                'radiation_level' => 0.18,
                'atmospheric_pressure' => 6.8,
                'altitude' => -6000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Olympus Mons Base',
                'description' => 'Camp de base sur le versant du plus grand volcan martien.',
                'surface_type' => 'volcanic',
                'temperature_min' => -80,
                'temperature_max' => -10,
                'humidity' => 1,
                'radiation_level' => 0.28,
                'atmospheric_pressure' => 0.7,
                'altitude' => 21200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Noachis Terra',
                'description' => 'Hautes terres craterisees anciennes, riche en silicates.',
                'surface_type' => 'regolith',
                'temperature_min' => -75,
                'temperature_max' => 0,
                'humidity' => 15,
                'radiation_level' => 0.21,
                'atmospheric_pressure' => 6.5,
                'altitude' => 3000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
