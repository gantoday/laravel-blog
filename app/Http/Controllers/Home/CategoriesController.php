<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        //$articles = Category::findBySlug($slug)->articles()->latest()->paginate(8);
        $page_size = setting('page_size');

        $category = Category::findBySlug($slug);

        $articles = \App\Article::with('tags', 'category')->whereHas('category', function ($query) use ($slug) {
            $query->whereSlug($slug);
        })->latest()->paginate($page_size);

        return view('home.categories.show', compact('articles', 'category'));
    }
}
