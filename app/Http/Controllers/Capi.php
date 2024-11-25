<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Capi extends Controller
{
    public function index()
{
    $url = 'https://goweather.herokuapp.com/weather/banjarbaru';
    $response = Http::get($url);

	 //return response()->json($response->json()); //untuk menampilkan JSON

    if ($response->successful()) {
        $api = $response->json();
        return view('api.index', compact('api'));
    } else {
        return abort(500, 'Gagal mengambil data dari API');
    }
}

}
