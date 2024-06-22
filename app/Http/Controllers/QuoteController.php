<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    public function showQuotes()
    {
        $quotes = $this->fetchQuotes(5);
        return view('quotes.index', ['quotes' => $quotes]);
    }

    public function refreshQuotes()
    {
        $quotes = $this->fetchQuotes(5);
        return response()->json($quotes);
    }

    protected function fetchQuotes($count)
    {
        $quotes = [];

        try {
            $responses = Http::pool(fn ($pool) => array_map(fn () => $pool->get('https://api.kanye.rest'), range(1, $count)));

            $quotes = array_map(fn ($response) => $response->successful() ? $response->json()['quote'] : 'Quote not available', $responses);

        } catch (\Exception $e) {
            Log::error('Error fetching quotes: ' . $e->getMessage());
            $quotes = array_fill(0, $count, 'Quote not available due to error');
        }

        return $quotes;
    }
}