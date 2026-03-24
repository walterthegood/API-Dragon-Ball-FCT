<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transformation;
use App\Models\Character;

class TransformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $goku = Character::where('name', 'Goku')->first();
        $vegeta = Character::where('name', 'Vegeta')->first();
        $gohan = Character::where('name', 'Gohan')->first();
        $Bulma = Character::where('name', 'Bulma')->first();
        $Celula = Character::where('name', 'Celula')->first();

        $gokuTransforms = [
            ['name' => 'Goku SSJ', 'ki' => '3 Billion', 'image' => 'https://dragonball-api.com/transformaciones/goku_ssj.webp'],
            ['name' => 'Goku SSJ2', 'ki' => '6 Billion', 'image' => 'https://dragonball-api.com/transformaciones/goku_ssj2.webp'],
            ['name' => 'Goku SSJ3', 'ki' => '24 Billion', 'image' => 'https://dragonball-api.com/transformaciones/goku_ssj3.webp'],
            ['name' => 'Goku SSJ4', 'ki' => '2 Quadrillion', 'image' => 'https://dragonball-api.com/transformaciones/goku_ssj4.webp'],
            ['name' => 'Goku SSJB', 'ki' => '9 Quintillion', 'image' => 'https://dragonball-api.com/transformaciones/goku_ssjb.webp'],
            ['name' => 'Goku Ultra Instinc', 'ki' => '90 Septillion', 'image' => 'https://dragonball-api.com/transformaciones/goku_ultra.webp'],
        ];

       foreach ($gokuTransforms as $t) {
            Transformation::create(array_merge($t, ['character_id' => $goku->id]));
        }

        Transformation::create([
            'name' => 'Vegeta SSJ', 
            'ki' => '330.000.000', 
            'character_id' => $vegeta->id,
            'image' => 'https://dragonball-api.com/transformaciones/vegeta SSJ (2).webp'
        ]);

        Transformation::create([
            'name' => 'Gohan SSJ', 
            'ki' => '4.700.000.000', 
            'character_id' => $gohan->id,
            'image' => 'https://dragonball-api.com/transformaciones/gohan_ssj-removebg-preview.webp'
        ]);

        Transformation::create([
            'name' => 'Semi Perfect Form', 
            'ki' => '897.000.000', 
            'character_id' => Character::where('name', 'Celula')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/Semi-Perfect_Cell.webp'
        ]);

        Transformation::create([
            'name' => 'Bulma', 
            'ki' => '0', 
            'character_id' => $Bulma->id,
            'image' => 'https://dragonball-api.com/characters/bulma.webp'
        ]);
        
        Transformation::create([
            'name' => 'Freezer 2nd Form', 
            'ki' => '100 Septillion', 
            'character_id' => Character::where('name', 'Freezer')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/freezer 2nd forma.webp'
        ]);

        Transformation::create([
            'name' => 'Zarbon Monster', 
            'ki' => '30.000', 
            'character_id' => Character::where('name', 'Zarbon')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/zarbon monster.webp'
        ]);
        
        Transformation::create([
            'name' => 'Imperfect Form', 
            'ki' => '370.000.000', 
            'character_id' => Character::where('name', 'Celula')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/cell imperfect.webp'
        ]);

        Transformation::create([
            'name' => 'Imperfect Form', 
            'ki' => '370.000.000', 
            'character_id' => Character::where('name', 'Freezer')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/cell imperfect.webp'
        ]);

        if (!$Celula) {
            Transformation::create([
                'name' => 'Super Perfect Form', 
                'ki' => '10.970.000.000', 
                'character_id' => $Celula->id,
                'image' => 'https://dragonball-api.com/transformaciones/cell perfect.webp'
            ]);
        }
    }
    
}
