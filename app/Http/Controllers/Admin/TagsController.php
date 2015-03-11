<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use App\Http\Requests\TagRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::latest()->paginate(15);

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());

        flash()->success('Your tag has been created!');

        return redirect('admin/tags/index');
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
        $tag = Tag::findBySlug($slug);

        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        $tags = \App\Tag::lists('name', 'id');

        return view('admin.tags.edit', compact('tag', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->update($request->all());

        return redirect('admin/tags/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        return redirect('admin/tags/index');
    }
}
