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
        Planet::create(['name' => 'Tierra', 'isDestroyed' => false, 'description' => 'Planeta azul del Sistema Solar, hogar de Goku.', 'image' => 'https://dragonball-api.com/planetas/Tierra_Dragon_Ball_Z.webp']);
        Planet::create(['name' => 'Planeta Vegeta', 'isDestroyed' => true, 'description' => 'Hogar original de la raza guerrera Saiyajin.' , 'image' => 'https://dragonball-api.com/planetas/Planeta_Vegeta_en_Dragon_Ball_Super_Broly.webp']);
        Planet::create(['name' => 'Namekusei', 'isDestroyed' => false, 'description' => 'Planeta natal de Piccolo y origen de las Esferas.', 'image' => 'https://static.wikia.nocookie.net/dragonball/images/7/71/Namek_U7.png/revision/latest/scale-to-width-down/1000?cb=20200911203844&path-prefix=es']);
        Planet::create(['name' => 'Planeta Sadala', 'isDestroyed' => false, 'description' => 'Hogar original de los Saiyajin del Universo 6.', 'image' => 'https://static.wikia.nocookie.net/dragonball/images/1/1d/Planeta_Sadala_anime_DBS.png/revision/latest?cb=20191209215241&path-prefix=es']);
        Planet::create(['name' => 'Planeta Yardrat', 'isDestroyed' => false, 'description' => 'Planeta donde Goku aprendió la teletransportación.', 'image' => 'https://static.wikia.nocookie.net/dragonball/images/b/b1/PlanetYardrat.png/revision/latest?cb=20100103162456&path-prefix=es']);
        Planet::create(['name' => 'Planeta de Bills', 'isDestroyed' => false, 'description' => 'Hogar del Dios de la Destrucción del Universo 7.', 'image' => 'https://static.wikia.nocookie.net/dragonball/images/a/af/Templo_de_Bills2.png/revision/latest?cb=20180613184840&path-prefix=es']);
        Planet::create(['name' => 'Planeta M2', 'isDestroyed' => false, 'description' => 'Planeta dominado por máquinas mutantes.', 'image' => 'https://static.wikia.nocookie.net/dragonball/images/4/40/Planeta_M2.jpg/revision/latest?cb=20100322213625&path-prefix=es']);
    }
}
