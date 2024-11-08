<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PageSpeedService
{
    protected $apiUrl = 'https://www.googleapis.com/pagespeedonline/v5/runPagespeed';
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey =  env('PAGESPEED_API_KEY');
    }

    public function analyze($url, $strategy = 'mobile')
    {
        try {
            $response = Http::get($this->apiUrl, [
                'url' => $url,
                'key' => $this->apiKey,
                'strategy' => $strategy // 'mobile' or 'desktop'
            ]);

            return $response->json();
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
