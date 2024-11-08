<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PageSpeedController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function analyze(Request $request)
    {
        $url = $request->input('url');
        $apiKey = env('GOOGLE_PAGESPEED_API_KEY'); // Add your API key in config/services.php

        $response = Http::get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed', [
            'url' => $url,
            'key' => $apiKey,
            'strategy' => 'mobile' // or 'desktop'
        ]);

        $results = $response->json();

        return view('results', compact('results'));
    }
    public function analyzeApi(Request $request)
{
    $url = $request->input('url');

    if (!$url) {
        return response()->json([
            'error' => 'URL is required'
        ], 422);
    }

    $apiKey = env('GOOGLE_PAGESPEED_API_KEY');

    try {
        $response = Http::get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed', [
            'url' => $url,
            'key' => $apiKey,
            'strategy' => 'mobile'
        ]);

        $results = $response->json();

        // Return JSON response instead of view
        return response()->json($results);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Failed to analyze URL',
            'message' => $e->getMessage()
        ], 500);
    }
}


}
