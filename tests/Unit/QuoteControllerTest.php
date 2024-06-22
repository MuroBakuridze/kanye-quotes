<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\QuoteController;
use ReflectionClass;

class QuoteControllerTest extends TestCase
{
    public function test_fetch_quotes()
    {
        Http::fake([
            'https://api.kanye.rest' => Http::response(['quote' => 'Test quote'], 200)
        ]);

        $controller = new QuoteController();

        $reflection = new ReflectionClass($controller);
        $method = $reflection->getMethod('fetchQuotes');
        $method->setAccessible(true);

        $quotes = $method->invokeArgs($controller, [5]);

        $this->assertCount(5, $quotes);
        $this->assertEquals('Test quote', $quotes[0]);
    }

    public function test_fetch_quotes_with_error()
    {
        Http::fake([
            'https://api.kanye.rest' => Http::response(null, 500)
        ]);

        $controller = new QuoteController();

        $reflection = new ReflectionClass($controller);
        $method = $reflection->getMethod('fetchQuotes');
        $method->setAccessible(true);

        $quotes = $method->invokeArgs($controller, [5]);

        $this->assertCount(5, $quotes);
        $this->assertEquals('Quote not available', $quotes[0]);
    }
}