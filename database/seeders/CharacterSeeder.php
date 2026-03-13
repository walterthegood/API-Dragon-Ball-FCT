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
            'image' => 'https://dragonball-api.com/characters/gohan_normal.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $tierra->id,
        ]);

        Character::create([
            'name' => 'Piccolo',
            'ki' => 30000000,
            'maxKi' => 500000000000000000,
            'race' => 'Namekian',
            'gender' => 'Male',
            'description' => 'Guerrero táctico y maestro de Gohan.',
            'image' => 'https://dragonball-api.com/characters/piccolo_normal.webp',
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
            'image' => 'https://dragonball-api.com/characters/frieza_normal.webp',
            'affiliation' => 'Villain',
            'planet_id' => $tierra->id, 
        ]);

        Character::create([
            'name' => 'Cell',
            'ki' => 900000000,
            'maxKi' => 40000000000,
            'race' => 'Android',
            'gender' => 'Male',
            'description' => 'Bio-androide perfecto.',
            'image' => 'https://dragonball-api.com/characters/cell_normal.webp',
            'affiliation' => 'Villain',
            'planet_id' => $tierra->id,
        ]);

        Character::create([
            'name' => 'Broly',
            'ki' => 100000000,
            'maxKi' => 9000000000000000000,
            'race' => 'Saiyan',
            'gender' => 'Male',
            'description' => 'El Super Saiyajin Legendario.',
            'image' => 'https://dragonball-api.com/characters/broly_normal.webp',
            'affiliation' => 'Neutral',
            'planet_id' => $vegeta->id,
        ]);

        Character::create([
            'name' => 'Jiren',
            'ki' => 1000000000,
            'maxKi' => 9000000000000000000,
            'race' => 'Unknown',
            'gender' => 'Male',
            'description' => 'El guerrero más fuerte del Universo 11.',
            'image' => 'https://dragonball-api.com/characters/jiren_normal.webp',
            'affiliation' => 'Pride Trp',
            'planet_id' => $tierra->id, 
        ]);

        Character::create([
            'name' => 'Trunks',
            'ki' => 35000000,
            'maxKi' => 300000000000000000,
            'race' => 'Half-Saiyan',
            'gender' => 'Male',
            'description' => 'Viajero del tiempo.',
            'image' => 'https://dragonball-api.com/characters/trunks_normal.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $tierra->id,
        ]);

        Character::create([
            'name' => 'Krillin',
            'ki' => 5000000,
            'maxKi' => 100000000,
            'race' => 'Human',
            'gender' => 'Male',
            'description' => 'El humano más fuerte.',
            'image' => 'https://dragonball-api.com/characters/krillin_normal.webp',
            'affiliation' => 'Z Fighter',
            'planet_id' => $tierra->id,
        ]);
    }
}
