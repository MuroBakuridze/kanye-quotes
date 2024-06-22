<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class RefreshQuotesTest extends TestCase
{
    public function test_refresh_quotes()
    {
        Http::fake([
            'https://api.kanye.rest' => Http::response(['quote' => 'Test quote'], 200)
        ]);

        $user = User::factory()->create();

        Sanctum::actingAs($user, ['*']);

        $response = $this->getJson('/api/quotes');

        $response->assertStatus(200);
        $response->assertJsonCount(5);
        $response->assertExactJson(['Test quote', 'Test quote', 'Test quote', 'Test quote', 'Test quote']);
    }
}
