<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller {

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
		$articles = Article::latest()->paginate(15);

		return view('home.articles.index',compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = \App\Tag::lists('name', 'id');

		$categories = \App\Category::lists('name', 'id');

		return view('home.articles.create', compact('tags', 'categories'));
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
	public function show($slug)
	{
        $article = Article::findBySlug($slug);
		
		return view('home.articles.show',compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $article = Article::findOrFail($id);

		$tags = \App\Tag::lists('name', 'id');

		$categories = \App\Category::lists('name', 'id');

		return view('home.articles.edit',compact('article', 'tags', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ArticleRequest $request, $id)
	{
        $article = Article::findOrFail($id);

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
	public function destroy($id)
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

	public function uploadImage()
    {
        $data = array();

        if ($file = Input::file('upload_file'))
        {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/uploads/images/';
            $destinationPath = public_path() . $folderName;
            $safeName        = uniqid().'.'.$extension;
            $file->move($destinationPath, $safeName);
            $data['filename'] = $folderName . $safeName;
        }
        return $data;
    }

}
