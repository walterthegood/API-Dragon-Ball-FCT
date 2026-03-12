<?php

namespace Tests\Feature;

use App\Models\Personaje;
use App\Models\Planeta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PersonajeTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_listar_personajes(): void
    {
        $planeta = Planeta::create(['nombre' => 'Tierra', 'destruido' => false]);
        Personaje::create(['nombre' => 'Goku', 'raza' => 'Saiyan', 'planeta_id' => $planeta->id]);
        Personaje::create(['nombre' => 'Vegeta', 'raza' => 'Saiyan', 'planeta_id' => $planeta->id]);

        $response = $this->getJson('/api/personajes');

        $response->assertStatus(200)
                 ->assertJsonCount(2)
                 ->assertJsonFragment(['nombre' => 'Goku']);
    }

    public function test_puede_crear_personaje(): void
    {
        $planeta = Planeta::create(['nombre' => 'Tierra', 'destruido' => false]);

        $data = [
            'nombre'      => 'Gohan',
            'raza'        => 'Saiyan',
            'ki'          => '45.000.000',
            'ki_maximo'   => '40 Septillion',
            'descripcion' => 'Hijo de Goku',
            'afiliacion'  => 'Z Fighter',
            'planeta_id'  => $planeta->id,
        ];

        $response = $this->postJson('/api/personajes', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Gohan', 'raza' => 'Saiyan']);

        $this->assertDatabaseHas('personajes', ['nombre' => 'Gohan']);
    }

    public function test_crear_personaje_valida_campos_requeridos(): void
    {
        $response = $this->postJson('/api/personajes', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nombre', 'raza']);
    }

    public function test_crear_personaje_valida_planeta_existente(): void
    {
        $response = $this->postJson('/api/personajes', [
            'nombre'     => 'Goku',
            'raza'       => 'Saiyan',
            'planeta_id' => 999,
        ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['planeta_id']);
    }

    public function test_puede_ver_personaje(): void
    {
        $planeta = Planeta::create(['nombre' => 'Tierra', 'destruido' => false]);
        $personaje = Personaje::create(['nombre' => 'Goku', 'raza' => 'Saiyan', 'planeta_id' => $planeta->id]);

        $response = $this->getJson("/api/personajes/{$personaje->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => 'Goku'])
                 ->assertJsonStructure(['id', 'nombre', 'raza', 'planeta']);
    }

    public function test_puede_actualizar_personaje(): void
    {
        $personaje = Personaje::create(['nombre' => 'Goku', 'raza' => 'Saiyan']);

        $response = $this->putJson("/api/personajes/{$personaje->id}", ['ki' => '90.000.000']);

        $response->assertStatus(200)
                 ->assertJsonFragment(['ki' => '90.000.000']);

        $this->assertDatabaseHas('personajes', ['id' => $personaje->id, 'ki' => '90.000.000']);
    }

    public function test_puede_eliminar_personaje(): void
    {
        $personaje = Personaje::create(['nombre' => 'Goku', 'raza' => 'Saiyan']);

        $response = $this->deleteJson("/api/personajes/{$personaje->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('personajes', ['id' => $personaje->id]);
    }

    public function test_retorna_404_si_personaje_no_existe(): void
    {
        $response = $this->getJson('/api/personajes/999');

        $response->assertStatus(404);
    }
}
