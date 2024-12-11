<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    // use DatabaseMigrations;

    public function test_can_navigate_to_categories_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/categories')
                    ->assertSee('Catégories');
        });
    }
    
    public function test_can_navigate_to_category_create_form(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/categories')
                    ->clickLink('Nouvelle catégorie')
                    ->assertSee('Créer une catégorie');


        });
    }
    public function test_can_create_category(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/categories')
                    ->clickLink('Nouvelle catégorie')
                    ->assertPathIs('/categories/create')
                    ->type('name', 'Test category')
                    ->press('Créer')
                    ->assertPathIs('/categories')
                    ->assertSee('Succés: Catégorie créée avec succès');
        });
    }
}
