<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    /**
     * Test all main public pages return successful HTTP 200 responses.
     */
    public function test_all_main_pages_return_successful_response(): void
    {
        $routes = [
            '/',
            '/feature',
            '/about',
            '/menu',
            '/team',
            '/gallery',
            '/contact',
            '/up',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }
}
