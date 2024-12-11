<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ArticleModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_article_can_be_created(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $article = $user->articles()->create([
            'title' => 'Test Article',
            'content' => 'This is a test article.',
            'category_id' => $category->id,
        ]);
        $this->assertDatabaseHas('articles', [
            'title' => $article->title,
            'content' => $article->content,
            'category_id' => $article->category_id,
        ]);

    }

    // public function test_an_article_belongs_to_a_user()
    // {
    //     // Création d'un utilisateur et d'un article
    //     $user = User::factory()->create();
    //     $article = Article::factory()->create(['user_id' => $user->id]);

    //     // Vérification de la relation
    //     $this->assertInstanceOf(User::class, $article->user);
    //     $this->assertEquals($user->id, $article->user->id);
    // }

    // public function test_an_article_belongs_to_a_category()
    // {
    //     // Création d'une catégorie et d'un article
    //     $category = Category::factory()->create();
    //     $article = Article::factory()->create(['category_id' => $category->id]);

    //     // Vérification de la relation
    //     $this->assertInstanceOf(Category::class, $article->category);
    //     $this->assertEquals($category->id, $article->category->id);
    // }

}
