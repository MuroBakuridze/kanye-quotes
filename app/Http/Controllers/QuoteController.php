<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    private function fetchQuotes($count)
    {
        $responses = Http::pool(fn ($pool) => array_map(fn () => $pool->get('https://api.kanye.rest'), range(1, $count)));

        $quotes = array_map(fn ($response) => $response->json()['quote'], $responses);

        return $quotes;
    }
}
