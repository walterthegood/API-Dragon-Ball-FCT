<?php

namespace Tests\Feature;

use App\Models\Planeta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanetaTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_listar_planetas(): void
    {
        Planeta::create(['nombre' => 'Tierra', 'descripcion' => 'Planeta azul', 'destruido' => false]);
        Planeta::create(['nombre' => 'Namek', 'descripcion' => 'Planeta verde', 'destruido' => false]);

        $response = $this->getJson('/api/planetas');

        $response->assertStatus(200)
                 ->assertJsonCount(2)
                 ->assertJsonFragment(['nombre' => 'Tierra']);
    }

    public function test_puede_crear_planeta(): void
    {
        $data = [
            'nombre'      => 'Vegeta',
            'descripcion' => 'Planeta de los Saiyans',
            'destruido'   => true,
            'imagen'      => 'https://example.com/vegeta.jpg',
        ];

        $response = $this->postJson('/api/planetas', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment(['nombre' => 'Vegeta', 'destruido' => true]);

        $this->assertDatabaseHas('planetas', ['nombre' => 'Vegeta']);
    }

    public function test_crear_planeta_valida_nombre_requerido(): void
    {
        $response = $this->postJson('/api/planetas', []);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['nombre']);
    }

    public function test_puede_ver_planeta(): void
    {
        $planeta = Planeta::create(['nombre' => 'Tierra', 'descripcion' => 'Planeta azul', 'destruido' => false]);

        $response = $this->getJson("/api/planetas/{$planeta->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['nombre' => 'Tierra'])
                 ->assertJsonStructure(['id', 'nombre', 'descripcion', 'destruido', 'personajes']);
    }

    public function test_puede_actualizar_planeta(): void
    {
        $planeta = Planeta::create(['nombre' => 'Tierra', 'descripcion' => 'Planeta azul', 'destruido' => false]);

        $response = $this->putJson("/api/planetas/{$planeta->id}", ['destruido' => true]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['destruido' => true]);

        $this->assertDatabaseHas('planetas', ['id' => $planeta->id, 'destruido' => true]);
    }

    public function test_puede_eliminar_planeta(): void
    {
        $planeta = Planeta::create(['nombre' => 'Tierra', 'descripcion' => 'Planeta azul', 'destruido' => false]);

        $response = $this->deleteJson("/api/planetas/{$planeta->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('planetas', ['id' => $planeta->id]);
    }

    public function test_retorna_404_si_planeta_no_existe(): void
    {
        $response = $this->getJson('/api/planetas/999');

        $response->assertStatus(404);
    }
}
