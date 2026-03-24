<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Planet;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscamos los IDs de los planetas para asignarlos
        $tierra = Planet::where('name', 'Tierra')->first();
        $vegeta = Planet::where('name', 'Planeta Vegeta')->first();
        $namek = Planet::where('name', 'Namekusei')->first();

        Character::create([
            'name' => 'Goku',
            'ki' => 60000000,
            'maxKi' => 9000000000000000000, // Al límite del BIGINT
            'race' => 'Saiyan',
            'gender' => 'Male',
            'description' => 'El protagonista de la serie.', 
            'image' => 'https://dragonball-api.com/characters/goku_normal.webp',
            'affiliation' => 'Z Fighter', 
            'planet_id' => $vegeta->id,
        ]);

        Character::create([
            'name' => 'Vegeta',
            'ki' => 55000000,
            'maxKi' => 8500000000000000000,
            'race' => 'Saiyan',
            'gender' => 'Male',
            'description' => 'El Príncipe de los Saiyajins.',
            'image' => 'https://dragonball-api.com/characters/vegeta_normal.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $vegeta->id,
        ]);

        Character::create([
            'name' => 'Gohan',
            'ki' => 40000000,
            'maxKi' => 8000000000000000000,
            'race' => 'Half-Saiyan',
            'gender' => 'Male',
            'description' => 'Hijo mayor de Goku.',
            'image' => 'https://dragonball-api.com/characters/gohan.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $tierra->id,
        ]);

        Character::create([
            'name' => 'Bulma',
            'ki' => 0,
            'maxKi' => 0,
            'race' => 'Human',
            'gender' => 'Female',
            'description' => 'Bulma es la protagonista femenina de la serie.',
            'image' => 'https://dragonball-api.com/characters/bulma.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $namek->id,
        ]);

        Character::create([
            'name' => 'Freezer',
            'ki' => 120000000,
            'maxKi' => 7000000000000000000,
            'race' => 'Frieza Race',
            'gender' => 'Male',
            'description' => 'Emperador del mal.',
            'image' => 'https://dragonball-api.com/characters/Freezer.webp',
            'affiliation' => 'Villain',
            'planet_id' => $tierra->id, 
        ]);

        Character::create([
            'name' => 'Zarbon',
            'ki' => 20000,
            'maxKi' => 40000,
            'race' => 'Frieza Race',
            'gender' => 'Male',
            'description' => 'Zarbon es uno de los secuaces de Freezer',
            'image' => 'https://dragonball-api.com/characters/zarbon.webp',
            'affiliation' => 'Army of Frieza',
            'planet_id' => $tierra->id,
        ]);

        Character::create([
            'name' => 'Dodoria',
            'ki' => 18000,
            'maxKi' => 20000,
            'race' => 'Frieza Race',
            'gender' => 'Male',
            'description' => 'Dodoria es otro secuaz de Freezer.',
            'image' => 'https://dragonball-api.com/characters/dodoria.webp',
            'affiliation' => 'Army of Frieza',
            'planet_id' => $vegeta->id,
        ]);

        Character::create([
            'name' => 'Ginyu',
            'ki' => 9000,
            'maxKi' => 25000,
            'race' => 'Frieza Race',
            'gender' => 'Male',
            'description' => 'Ginyu es el líder del la élite de mercenarios.',
            'image' => 'https://dragonball-api.com/characters/ginyu.webp',
            'affiliation' => 'Army of Frieza',
            'planet_id' => $tierra->id, 
        ]);

        Character::create([
            'name' => 'Celula',
            'ki' => 250000000,
            'maxKi' => "5 Billion",
            'race' => 'Android',
            'gender' => 'Male',
            'description' => 'Cell conocido como Célula en España...',
            'image' => 'https://dragonball-api.com/characters/celula.webp',
            'affiliation' => 'Freelancer',
            'planet_id' => $tierra->id,
        ]);

        Character::create([
            'name' => 'Krillin',
            'ki' => 5000000,
            'maxKi' => "1 Billion",
            'race' => 'Human',
            'gender' => 'Male',
            'description' => 'El humano más fuerte.',
            'image' => 'https://dragonball-api.com/characters/Krilin_Universo7.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $tierra->id,
        ]);
    }
}
