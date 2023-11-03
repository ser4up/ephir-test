<?php

namespace Tests;

use App\Services\ExternalUser\ApiClient;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function fakeApiCall(array $inputDataFiles): void
    {
        $apiUrl = str_replace('https://', '', ApiClient::EXTERNAL_USER_URL);

        $sequence = Http::sequence();
        foreach($inputDataFiles as $inputDataFile) {
            $inputData = Storage::disk('test')->get($inputDataFile);
            $sequence->push($inputData, 200);
        }

        Http::fake([
            $apiUrl => $sequence,
        ]);
    }
}
