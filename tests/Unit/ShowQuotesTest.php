<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class ShowQuotesTest extends TestCase
{
    public function test_show_quotes()
    {
        Http::fake([
            'https://api.kanye.rest' => Http::response(['quote' => 'Test quote'], 200)
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/quotes');

        $response->assertStatus(200);
        $response->assertViewHas('quotes', function ($quotes) {
            return count($quotes) === 5 && $quotes[0] === 'Test quote';
        });
    }
}
