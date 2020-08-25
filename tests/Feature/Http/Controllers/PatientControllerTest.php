<?php

namespace Tests\Feature\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_requires_authentication()
    {
        $response = $this
            ->json('POST', '/patients', [
                'first_name' => 'The',
                'last_name' => 'Terminator',
            ]);

        $response->assertUnauthorized();
    }

    public function test_it_creates_a_patient()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->json('POST', '/patients', [
                'first_name' => 'Sarah',
                'last_name' => 'Connor',
                'date_of_birth' => '1963-05-13',
                'email' => 'sarah.conner@example.com',
            ]);

        $response
            ->assertCreated()
            ->assertExactJson([
                'data' => [
                    'first_name' => 'Sarah',
                    'last_name' => 'Connor',
                    'date_of_birth' => '1963-05-13',
                    'email' => 'sarah.conner@example.com',
                ],
	    ]);
    }

    public function test_it_shows_a_patient()
    {
        $user = factory(User::class)->create();
        $patient = factory(Patient::class)->create();

        $response = $this
            ->actingAs($user)
            ->json('GET', "/patients/{$patient->id}");

        $response
            ->assertOk()
            ->assertJson([
                'data' => [
                    'first_name' => $patient->first_name,
                    'last_name' => $patient->last_name,
                    'date_of_birth' => $patient->date_of_birth->format('Y-m-d'),
                    'email' => $patient->email,
                ],
            ]);
    }
}
