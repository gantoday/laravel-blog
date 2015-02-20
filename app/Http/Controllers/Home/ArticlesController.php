<?php namespace App\Http\Controllers\Home;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Input;

class ArticlesController extends Controller {

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
