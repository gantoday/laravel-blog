<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $page_size = setting('page_size');

        $articles = Article::with('tags', 'category')->latest()->paginate($page_size);

        return view('home.articles.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($slug)
    {
        $article = Article::findBySlug($slug);

        return view('home.articles.show', compact('article'));
    }
}
