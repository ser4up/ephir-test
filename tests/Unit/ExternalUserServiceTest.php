<?php

namespace Tests\Unit;

use App\Services\ExternalUser\ApiClient;
use App\Services\ExternalUser\ExternalUserService;
use Tests\TestCase;

/** FYI: to write better tests it is needed more time */
class ExternalUserServiceTest extends TestCase
{
    public function test_get_users_success(): void
    {
        $this->fakeApiCall([
            'ExternalUserApiSuccess.json',
            'ExternalUserApiSuccess2.json'
        ]);

        $outputData = (new ExternalUserService(new ApiClient()))->getUsers(2);

        $this->assertEquals($outputData, $this->expectation());
    }

    public function test_get_users_failure(): void
    {
        $this->fakeApiCall([
            'ExternalUserApiFailure.json',
            'ExternalUserApiFailure2.json'
        ]);

        $outputData = (new ExternalUserService(new ApiClient()))->getUsers(2);

        $this->assertArrayHasKey(0, $outputData);

        $this->assertArrayHasKey('firstName', $outputData[0]);
        $this->assertNull($outputData[0]['firstName']);

        $this->assertArrayHasKey('lastName', $outputData[0]);
        $this->assertNull($outputData[0]['lastName']);

        $this->assertArrayHasKey(1, $outputData);

        $this->assertArrayHasKey('firstName', $outputData[1]);
        $this->assertNull($outputData[1]['firstName']);

        $this->assertArrayHasKey('lastName', $outputData[1]);
        $this->assertNull($outputData[1]['lastName']);

        $this->assertNotEquals($outputData, $this->expectation());
    }

    private function expectation()
    {
        return [
            [
                'firstName' => 'Gladys',
                'lastName' => 'Williamson',
                'phone' => '(894) 525-6139',
                'email' => 'gladys.williamson@example.com',
                'country' => 'United States',
            ],
            [
                'firstName' => 'Blake',
                'lastName' => 'Martin',
                'phone' => '(667)-035-5436',
                'email' => 'blake.martin@example.com',
                'country' => 'New Zealand',
            ],
        ];
    }
}
