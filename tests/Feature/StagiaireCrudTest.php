<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Stagiaire;

class StagiaireCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_stagiaire()
    {
        $response = $this->post(route('stagiaire.store'), [
            'nom' => 'EL Amrani',
            'prenom' => 'said',
            'datenaissance' => '2000-01-01',
            'adresse' => 'Casablanca',
        ]);

        $response->assertStatus(302); // souvent redirect après store
        $this->assertDatabaseHas('stagiaires', [
            'nom' => 'EL Amrani',
            'prenom' => 'said',
            'adresse' => 'Casablanca',
        ]);
    }

    public function test_update_stagiaire()
    {
        $stagiaire = Stagiaire::factory()->create([
            'nom' => 'Ancien',
            'prenom' => 'Ancien',
            'adresse' => 'Rabat'
        ]);

        $response = $this->put(route('stagiaire.update', $stagiaire), [
            'nom' => 'Nouveau',
            'prenom' => 'Nouveau',
            'datenaissance' => $stagiaire->datenaissance,
            'adresse' => 'Tanger',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('stagiaires', [
            'id' => $stagiaire->id,
            'nom' => 'Nouveau',
            'prenom' => 'Nouveau',
            'adresse' => 'Tanger',
        ]);
    }

    public function test_delete_stagiaire()
    {
        $stagiaire = Stagiaire::factory()->create();

        $response = $this->delete(route('stagiaire.destroy', $stagiaire));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('stagiaires', [
            'id' => $stagiaire->id,
        ]);
    }
}
