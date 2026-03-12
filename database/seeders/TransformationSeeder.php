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

        Transformation::create(['name' => 'Oozaru', 'ki' => 600000000, 'character_id' => $goku->id]);
        Transformation::create(['name' => 'SSJ1', 'ki' => 3000000000, 'character_id' => $goku->id]);
        Transformation::create(['name' => 'SSJ Dios', 'ki' => 100000000000, 'character_id' => $goku->id]);
        Transformation::create(['name' => 'SSJ Blue', 'ki' => 500000000000, 'character_id' => $goku->id]);
        Transformation::create(['name' => 'Ultra Instinto', 'ki' => 999999999999, 'character_id' => $goku->id]); 
        
        Transformation::create(['name' => 'Ultra Ego', 'ki' => 999999999999, 'character_id' => $vegeta->id]);
        Transformation::create(['name' => 'Gohan Bestia', 'ki' => 950000000000, 'character_id' => $gohan->id]);
        Transformation::create(['name' => 'Golden', 'ki' => 450000000000, 'character_id' => $frieza->id]);
    }
    
}
