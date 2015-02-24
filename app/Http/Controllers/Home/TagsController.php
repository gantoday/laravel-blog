<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller {

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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		//$articles = Tag::findBySlug($slug)->articles()->latest('articles.created_at')->paginate(8);

		$pagination = setting('pagination');
		
		$tag = Tag::findBySlug($slug);

		$articles = \App\Article::with('tags', 'category')->whereHas('tags', function($query) use($slug)
		{
			$query->whereSlug($slug);
		})->latest()->paginate($pagination);

		return view('home.tags.show',compact('articles', 'tag'));
	}


}
