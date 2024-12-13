<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User 01',
            'email' => 'test01@example.com',
            'password'=>'password'
        ]);
        User::factory()->create([
            'name' => 'Test User 02',
            'email' => 'test02@example.com',
            'password'=>'password'
        ]);

        Article::factory(20)->create();


    }
}
