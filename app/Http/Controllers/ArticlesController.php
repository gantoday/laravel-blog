<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth',['except'=>'index']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest()->get();

		return view('articles.index',compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = \App\Tag::lists('name', 'id');

		return view('articles.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$this->createArticle($request);

		flash()->success('Your article has been created!');

		return redirect('articles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Article $article)
	{
		
		return view('articles.show',compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Article $article)
	{

		$tags = \App\Tag::lists('name', 'id');

		return view('articles.edit',compact('article', 'tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ArticleRequest $request, Article $article)
	{

		$article->update($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return redirect('articles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Article $article)
	{
		//
	}

	public function syncTags(Article $article, array $tags)
	{
		$article->tags()->sync($tags);
	}

	public function createArticle(ArticleRequest $request)
	{
		$article = \Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));
	}
}
