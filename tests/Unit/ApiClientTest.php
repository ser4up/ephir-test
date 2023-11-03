<?php

namespace Tests\Unit;

use App\Services\ExternalUser\ApiClient;
use Tests\TestCase;

/** FYI: to write better tests it is needed more time */
class ApiClientTest extends TestCase
{
    public function test_get_external_user_success(): void
    {
        $this->fakeApiCall([
            'ExternalUserApiSuccess.json'
        ]);

        $outputData = (new ApiClient())->getExternalUser()->toArray();

        $this->assertEquals($outputData, $this->expectation());
    }

    public function test_get_external_user_failure(): void
    {
        $this->fakeApiCall([
            'ExternalUserApiFailure.json'
        ]);

        $outputData = (new ApiClient())->getExternalUser()->toArray();

        $this->assertArrayHasKey('firstName', $outputData);
        $this->assertNull($outputData['firstName']);

        $this->assertArrayHasKey('lastName', $outputData);
        $this->assertNull($outputData['lastName']);
        
        $this->assertNotEquals($outputData, $this->expectation());
    }

    private function expectation()
    {
        return [
            'firstName' => 'Gladys',
            'lastName' => 'Williamson',
            'phone' => '(894) 525-6139',
            'email' => 'gladys.williamson@example.com',
            'country' => 'United States',
        ];
    }
}
