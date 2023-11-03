<?php

namespace Tests\Unit;

use App\Services\ExternalUser\ExternalUser;
use PHPUnit\Framework\TestCase;

/** FYI: to write better tests it is needed more time */
class ExternalUserTest extends TestCase
{
    public function test_mapping_success(): void
    {
        $inputData = [
            'name' => [
                'first' => 'Ben',
                'last' => 'Simmmons',
            ],
            'phone' => '09-1592-6728',
            'email' => 'ben.simmmons@example.com',
            'location' => [
                'country' => 'Australia',
            ],
        ];

        $outputData = 
            (new ExternalUser($inputData))
            ->toArray();

        $this->assertEquals($outputData, $this->expectation());
    }

    public function test_mapping_failure(): void
    {
        $inputData = [
            'phone' => '09-1592-6728',
            'email' => 'ben.simmmons@example.com',
            'location' => [
                'country' => 'Australia',
            ],
        ];

        $outputData = 
            (new ExternalUser($inputData))
            ->toArray();

        $this->assertNotEquals($outputData, $this->expectation());
    }

    private function expectation()
    {
        return [
            'firstName' => 'Ben',
            'lastName' => 'Simmmons',
            'phone' => '09-1592-6728',
            'email' => 'ben.simmmons@example.com',
            'country' => 'Australia',
        ];
    }
}
