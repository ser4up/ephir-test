<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/** FYI: to write better tests it is needed more time */
class MainControllerTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_main_controller_index_without_limit_successful_response(): void
    {
        $response = $this->get('/api/external-users');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_main_controller_index_with_limit_successful_response(): void
    {
        $response = $this->get('/api/external-users/1');

        $response->assertStatus(200);
    }
}
