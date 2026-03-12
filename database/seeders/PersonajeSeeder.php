<?php

namespace Database\Seeders;

use App\Models\Personaje;
use Illuminate\Database\Seeder;

class PersonajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personajes = [
            [
                'nombre'      => 'Goku',
                'raza'        => 'Saiyan',
                'ki'          => '60.000.000',
                'ki_maximo'   => '90 Septillion',
                'descripcion' => 'El protagonista principal de Dragon Ball. Un Saiyan enviado a la Tierra de bebé, criado como humano.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016556/Goku_gnpqtf.webp',
                'afiliacion'  => 'Z Fighter',
                'planeta_id'  => 1,
            ],
            [
                'nombre'      => 'Vegeta',
                'raza'        => 'Saiyan',
                'ki'          => '54.000.000',
                'ki_maximo'   => '19.84 Septillion',
                'descripcion' => 'Príncipe de la raza Saiyan y rival principal de Goku que luego se convierte en aliado.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016557/Vegeta_leklpa.webp',
                'afiliacion'  => 'Z Fighter',
                'planeta_id'  => 1,
            ],
            [
                'nombre'      => 'Gohan',
                'raza'        => 'Saiyan',
                'ki'          => '45.000.000',
                'ki_maximo'   => '40 Septillion',
                'descripcion' => 'Hijo de Goku y Chi-Chi, mestizo Saiyan-Humano con un potencial extraordinario.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016556/Gohan_oumpcf.webp',
                'afiliacion'  => 'Z Fighter',
                'planeta_id'  => 1,
            ],
            [
                'nombre'      => 'Piccolo',
                'raza'        => 'Namekiano',
                'ki'          => '2.000.000',
                'ki_maximo'   => '98.4 Billion',
                'descripcion' => 'Namekiano guerrero, antiguo enemigo de Goku reconvertido en tutor de Gohan y aliado del equipo Z.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016556/Piccolo_gmspnm.webp',
                'afiliacion'  => 'Z Fighter',
                'planeta_id'  => 3,
            ],
            [
                'nombre'      => 'Freezer',
                'raza'        => 'Icejin',
                'ki'          => '530.000',
                'ki_maximo'   => '1.478 Septillion',
                'descripcion' => 'El tirano del universo que destruyó el planeta Vegeta y la raza Saiyan.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016557/Frieza_yjvxjz.webp',
                'afiliacion'  => 'Ejército de Freezer',
                'planeta_id'  => 5,
            ],
            [
                'nombre'      => 'Cell',
                'raza'        => 'Android',
                'ki'          => '900.000.000',
                'ki_maximo'   => '900 Billion',
                'descripcion' => 'Android perfecto creado por el Doctor Gero, combinación de ADN de los guerreros más poderosos.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016556/Cell_rrucuy.webp',
                'afiliacion'  => 'Red Ribbon Army',
                'planeta_id'  => null,
            ],
            [
                'nombre'      => 'Majin Buu',
                'raza'        => 'Majin',
                'ki'          => '2.000.000.000',
                'ki_maximo'   => '10 Septillion',
                'descripcion' => 'Ser de pura maldad creado por el mago Bibidi, capaz de absorber a otros seres para ganar sus poderes.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016557/MajinBuu_yqjmxs.webp',
                'afiliacion'  => 'Ejército de Babidi',
                'planeta_id'  => null,
            ],
            [
                'nombre'      => 'Trunks',
                'raza'        => 'Saiyan',
                'ki'          => '17.000.000',
                'ki_maximo'   => '98.4 Billion',
                'descripcion' => 'Hijo de Vegeta y Bulma, viajero del tiempo desde un futuro apocalíptico.',
                'imagen'      => 'https://res.cloudinary.com/dgtgbyo76/image/upload/v1699016557/Trunks_y7xhlr.webp',
                'afiliacion'  => 'Z Fighter',
                'planeta_id'  => 1,
            ],
        ];

        foreach ($personajes as $personaje) {
            Personaje::create($personaje);
        }
    }
}
