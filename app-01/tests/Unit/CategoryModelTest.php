<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class CategoryModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_a_category_can_be_created(): void
    {
        $category = Category::factory()->create();

        $this->assertDatabaseHas('categories', [
            'name' => $category->name,
        ]);
    }
}
