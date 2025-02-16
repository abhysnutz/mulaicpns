<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class WilayahController extends Controller
{
    public function province(){
        $client = new Client(); // Inisialisasi Guzzle Client
        $url = 'https://www.wilayah.id/api/provinces.json'; // URL API wilayah.id

        try {
            $response = Http::get('https://www.wilayah.id/api/provinces.json');

            if ($response->successful()) {
                $provinces = $response->json();
                dd($provinces);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengambil data provinsi', 'message' => $e->getMessage()], 500);
        }
    }
}
