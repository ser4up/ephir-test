<?php

namespace App\Services\ExternalUser;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class ApiClient implements ApiClientI
{
    const EXTERNAL_USER_URL = 'https://randomuser.me/api/';

    /**
     * It returns one external user by API
     * 
     * @return ExternalUserI|null
     * @throws ConnectionException
     */
    public function getExternalUser(): ?ExternalUserI
    {
        // Get user by API
        $response = Http::get(static::EXTERNAL_USER_URL);
        if ($response->failed()) {
            return null;
        }

        $responseArray = $response->json('results')[0] ?? [];

        // Map raw data to object and return
        return new ExternalUser($responseArray);
    }
}
