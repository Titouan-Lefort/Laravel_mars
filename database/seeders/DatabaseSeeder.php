<?php

namespace Database\Seeders;

use App\Models\Biome;
use App\Models\Registre;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        if (Biome::count() === 0) {
            Biome::insert([
                [
                    'name' => 'Ares Vallis',
                    'description' => 'Zone rocheuse avec canyon ancien.',
                    'surface_type' => 'rocky',
                    'temperature_min' => -65,
                    'temperature_max' => 5,
                    'humidity' => 10,
                    'radiation_level' => 0.2300,
                    'atmospheric_pressure' => 6.1,
                    'altitude' => -2400,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Planum Boreum',
                    'description' => 'Region polaire froide et glacee.',
                    'surface_type' => 'icy',
                    'temperature_min' => -125,
                    'temperature_max' => -15,
                    'humidity' => 25,
                    'radiation_level' => 0.1500,
                    'atmospheric_pressure' => 7.2,
                    'altitude' => 1200,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        if (Registre::count() === 0) {
            $biomeIds = Biome::query()->pluck('id')->all();

            foreach ($biomeIds as $index => $biomeId) {
                Registre::create([
                    'biome_id' => $biomeId,
                    'rh_factor' => $index % 2 === 0 ? 'Rh+' : 'Rh-',
                    'accreditation_level' => (string) (($index % 5) + 1),
                ]);
            }
        }
    }
}
