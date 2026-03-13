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
        $frieza = Character::where('name', 'Freezer')->first();
        $piccolo = Character::where('name', 'Piccolo')->first();

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
            'name' => 'Ultra Ego', 
            'ki' => '90 Septillion', 
            'character_id' => $vegeta->id,
            'image' => 'https://dragonball-api.com/transformaciones/vegeta_ultra_ego.webp'
        ]);

        Transformation::create([
            'name' => 'Gohan Bestia', 
            'ki' => '80 Septillion', 
            'character_id' => $gohan->id,
            'image' => 'https://dragonball-api.com/transformaciones/gohan_beast.webp'
        ]);

        Transformation::create([
            'name' => 'Cell Perfecto', 
            'ki' => '50 Septillion', 
            'character_id' => Character::where('name', 'Cell')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/cell_perfect.webp'
        ]);

        Transformation::create([
            'name' => 'Broly SSJ Legendario', 
            'ki' => '70 Septillion', 
            'character_id' => Character::where('name', 'Broly')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/broly_ssj_legendary.webp'
        ]);
        
        Transformation::create([
            'name' => 'Jiren Full Power', 
            'ki' => '100 Septillion', 
            'character_id' => Character::where('name', 'Jiren')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/jiren_full_power.webp'
        ]);

        Transformation::create([
            'name' => 'Trunks SSJ Future', 
            'ki' => '30 Septillion', 
            'character_id' => Character::where('name', 'Trunks')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/trunks_ssj_future.webp'
        ]);
        
        Transformation::create([
            'name' => 'Krillin Destructo Disk', 
            'ki' => '1 Million', 
            'character_id' => Character::where('name', 'Krillin')->first()->id,
            'image' => 'https://dragonball-api.com/transformaciones/krillin_destructo.webp'
        ]);

        Transformation::create([
            'name' => 'Golden Freezer', 
            'ki' => '400 Quadrillion', 
            'character_id' => $frieza->id,
            'image' => 'https://dragonball-api.com/transformaciones/frieza_golden.webp'
        ]);

        if ($piccolo) {
            Transformation::create([
                'name' => 'Orange Piccolo', 
                'ki' => '70 Septillion', 
                'character_id' => $piccolo->id,
                'image' => 'https://dragonball-api.com/transformaciones/piccolo_orange.webp'
            ]);
        }
    }
    
}
