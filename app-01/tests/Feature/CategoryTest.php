<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_category_route_exists(): void
    {
        $response = $this->post('/categories');

        $response->assertStatus(302);
    }
    public function test_can_create_category(): void
    {
        $this->post('/categories',['name'=>'Test Category']);

        $this->assertDatabaseHas('categories',['name'=>'Test Category']);

    }
}
