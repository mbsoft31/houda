<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    //use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        //$this->seed(DatabaseSeeder::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_create_theme()
    {

        $response = $this->actingAs(User::find(2))->post('/theme/store', [
            "title" => "bla bla theme",
            "speciality_id" => 1,
            "objective" => "sdjfhlsdkfjlm",
            "resume" => "sdfjdhlfklsd",
        ]);




        //$response->assertStatus(200);
    }
}
