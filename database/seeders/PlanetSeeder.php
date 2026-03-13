<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Planet;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Planet::create(['name' => 'Tierra', 'isDestroyed' => false, 'description' => 'Planeta azul del Sistema Solar, hogar de Goku.', 'image' => 'https://dragonball-api.com/planets/earth.webp']);
        Planet::create(['name' => 'Planeta Vegeta', 'isDestroyed' => true, 'description' => 'Hogar original de la raza guerrera Saiyajin.' , 'image' => 'https://dragonball-api.com/planets/vegeta.webp']);
        Planet::create(['name' => 'Namekusei', 'isDestroyed' => false, 'description' => 'Planeta natal de Piccolo y origen de las Esferas.', 'image' => 'https://dragonball-api.com/planets/namekusei.webp']);
        Planet::create(['name' => 'Planeta Sadala', 'isDestroyed' => false, 'description' => 'Hogar original de los Saiyajin del Universo 6.', 'image' => 'https://dragonball-api.com/planets/sadala.webp']);
        Planet::create(['name' => 'Planeta Yardrat', 'isDestroyed' => false, 'description' => 'Planeta donde Goku aprendió la teletransportación.', 'image' => 'https://dragonball-api.com/planets/yardrat.webp']);
        Planet::create(['name' => 'Planeta de Bills', 'isDestroyed' => false, 'description' => 'Hogar del Dios de la Destrucción del Universo 7.', 'image' => 'https://dragonball-api.com/planets/bills.webp']);
        Planet::create(['name' => 'Planeta M2', 'isDestroyed' => false, 'description' => 'Planeta dominado por máquinas mutantes.', 'image' => 'https://dragonball-api.com/planets/m2.webp']);
    }
}
