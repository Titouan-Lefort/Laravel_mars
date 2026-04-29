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
            $this->call(BiomeSeeder::class);
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
