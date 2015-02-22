<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller {

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
		//$articles = Category::findBySlug($slug)->articles()->latest()->paginate(8);
		
		$articles = \App\Article::with('tags', 'category')->whereHas('category', function($query) use($slug)
	    {
	        $query->whereSlug($slug);
	    })->latest()->paginate(8);
	    
		return view('home.categories.show',compact('articles'));
	}


}
