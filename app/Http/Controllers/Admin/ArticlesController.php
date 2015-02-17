<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Input;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest()->paginate(15);
        
		return view('admin.articles.index',compact('articles'));
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

		return view('admin.articles.create', compact('tags', 'categories'));
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

		return redirect('admin/articles');
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
		
		return view('articles.show',compact('article'));
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

		return view('admin.articles.edit',compact('article', 'tags', 'categories'));
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

		return redirect('admin/articles/index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::find($id)->delete();

        return redirect('admin/articles/trash');
	}

    public function trash()
    {
        $articles = Article::onlyTrashed()->latest('deleted_at')->paginate(15);
        
        return view('admin.articles.trash', compact('articles'));
    }

    public function restore($id)
    {
        Article::onlyTrashed()->find($id)->restore();

        return redirect('admin/articles');
    }

    public function forceDelete($id)
    {
        Article::onlyTrashed()->find($id)->forceDelete();

        return redirect('admin/articles/trash');
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
        $data = [
            'success' => false,
            'msg' => 'Failed!',
            'file_path' => ''
        ];

        if ($file = Input::file('upload_file'))
        {
            $fileName        = $file->getClientOriginalName();
            $extension       = $file->getClientOriginalExtension() ?: 'png';
            $folderName      = '/images';
            $destinationPath = public_path() . $folderName;
            $safeName        = uniqid().'.'.$extension;
            $file->move($destinationPath, $safeName);
            $data['success'] = true;
            $data['msg'] = "Succeeded!";
            $data['file_path'] = $folderName .'/'. $safeName;
        }
        return $data;
    }

}
