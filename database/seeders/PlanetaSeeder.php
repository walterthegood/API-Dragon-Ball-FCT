<?php

namespace Database\Seeders;

use App\Models\Planeta;
use Illuminate\Database\Seeder;

class PlanetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planetas = [
            [
                'nombre'      => 'Tierra',
                'descripcion' => 'Planeta de origen de los humanos y residencia principal de los Z Warriors.',
                'destruido'   => false,
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016703/Tierra_wf90cg.webp',
            ],
            [
                'nombre'      => 'Vegeta',
                'descripcion' => 'Planeta natal de los Saiyans, destruido por Freezer.',
                'destruido'   => true,
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016703/PlanetaVegeta_lsblvy.webp',
            ],
            [
                'nombre'      => 'Namek',
                'descripcion' => 'Planeta natal de los Namekianos, destruido por Freezer y recreado posteriormente.',
                'destruido'   => false,
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016703/Namek_hvgr3s.webp',
            ],
            [
                'nombre'      => 'Kaiosama',
                'descripcion' => 'Pequeño planeta del Gran Kaio del Norte, conocido por su alta gravedad.',
                'destruido'   => false,
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016703/PlanetaKaio_jkqber.webp',
            ],
            [
                'nombre'      => 'Freezer Número 79',
                'descripcion' => 'Planeta base de operaciones del ejército de Freezer.',
                'destruido'   => false,
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016703/PlanetaFreezer_w1kvrn.webp',
            ],
        ];

        foreach ($planetas as $planeta) {
            Planeta::create($planeta);
        }
    }
}
