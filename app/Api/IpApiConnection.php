<?php

namespace App\Api;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IpApiConnection
{
    /**
     * Connection to http://ip-api.com/
     *
     * @param string $guest_ip
     * @return array
     */
    public function getDataFromAPI(string $guest_ip): array
    {
        try {
            $response = Http::get('http://ip-api.com/php/' . $guest_ip);
            return unserialize($response->body());
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return [];
        }
    }
}
