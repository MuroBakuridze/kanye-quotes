<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kanye Quotes') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <ul id="quotes" class="list-group">
                    @foreach ($quotes as $quote)
                        <li class="list-group-item">{{ $quote }}</li>
                    @endforeach
                </ul>
                <div class="d-flex justify-content-center mt-3">
                    <button id="refresh-button" onclick="refreshQuotes()" class="btn font-weight-bold">
                        Refresh Quotes
                        <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>