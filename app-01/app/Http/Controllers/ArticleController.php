<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Auth::user()->articles;
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Log::debug($request->user());
        if ($request->user()->cannot('create', Article::class)) {
            abort(403);
        }

        // $categories = Category::all();

        // $categories = Cache::rememberForever('categories', function () {
        //     return Category::all();
        // });
        $categories = Cache::store('redis')->rememberForever('categories', function () {
            return Category::all();
        });


        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        Article::create($request->only('title', 'content', 'category_id') + ['user_id' => $user->id]);
        return redirect('/articles')->with('success', 'Nouvel article créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if(!Gate::allows('delete-article')){
            abort(403);
        }
        $article->delete();
        return redirect('/articles')->with('success', 'Article supprimé avec succès');
    }
}
