<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ScrapeArticles implements ShouldQueue
{
    use Queueable;
    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // sleep(5);
        $url = "https://jsonplaceholder.typicode.com/posts";
        $response = Http::get($url);
        $articles = $response->json();
        $new_articles = collect($articles)->map(function ($article) {
            return [
                'title' => $article['title'],
                'content' => $article['body'],
                'category_id' => 1,
                'user_id' => $this->userId,
            ];
        })->random()->take(3)->toArray();

        Log::debug($new_articles);

        Article::insert($new_articles);
    }
}
