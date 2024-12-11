<?php

namespace Tests\Browser;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ArticleFormTest extends DuskTestCase
{
    // public function test_it_allows_a_user_to_create_an_article()
    public function testItAllowsAUserToCreateAnArticle(): void
    {
        $this->browse(function (Browser $browser) {

            $user = User::factory()->create();
            $category = Category::factory()->create();

            $browser->loginAs($user)
                    ->visit('/articles/create')
                    ->type('title', 'Test article')
                    ->type('content', 'Test content')
                    ->select('category_id', $category->id)
                    ->press('Créer')
                    ->assertPathIs('/articles')
                    ->assertSee('Nouvel article créé avec succès');
        });
    }
}
