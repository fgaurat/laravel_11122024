<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{

    public function test_a_user_can_create_an_article_with_a_category(): void
    {
        // $response = $this->get('/');
        // $response->assertStatus(200);

        $user = User::factory()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)
            ->post('/articles', [
                'title' => 'Test Article',
                'content' => 'Test Article Body',
                'category_id' => $category->id,
                'user_id' => $user->id
            ])
            ->assertRedirect("/articles");

        $this->assertDatabaseHas('articles', [
            'title' => 'Test Article',
            'content' => 'Test Article Body',
            'category_id' => $category->id
        ]);

    }
}
