<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestaurantController extends Controller
{
    public function showForm()
    {
        return view('search');
    }

    public function search(Request $request)
    {
        $city = $request->input('city');
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $endpoint = 'https://maps.googleapis.com/maps/api/place/textsearch/json';

        $response = Http::get($endpoint, [
            'query' => 'restaurants in ' . $city,
            'key' => $apiKey,
        ]);

        $results = $response->json()['results'] ?? [];
        $restaurants = [];

        foreach (array_slice($results, 0, 10) as $result) {
            $restaurants[] = [
                'name' => $result['name'],
                'address' => $result['formatted_address'],
                'rating' => $result['rating'] ?? null,
            ];
        }

        return view('results', compact('restaurants', 'city'));
    }
}