<?php

namespace Nico44\Controllers;
use Illuminate\Http\RedirectResponse;
use Nico44\Models\Tag;

class TagController
{
    public function index()
    {
        $title = '<h1>Tags page</h1>';
        $tags = Tag::all();

        return view('tags/index', compact('title', 'tags'));
    }

    public function show($id)
    {
        $title = '<h1>Tags page</h1>';
        $tag = Tag::find($id);

        return view('tags/show', compact('title', 'tag'));
    }

    public function create()
    {
        $title = '<h1>Tags page</h1>';
        $tag = new Tag();

        return view('tags/adding_form', compact('title', 'tag'));
    }

    public function store()
    {
        $request = request();

        $tag = new Tag();
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->save();
        return new RedirectResponse('/tag');
    }

    public function edit($id)
    {
        $title = '<h1>Tags page</h1>';
        $tag = Tag::find($id);

        return view('tags/updating_form', compact('title', 'tag'));
    }

    public function update()
    {
        $request = request();

        $tag = Tag::find($request->input('id'));
        $tag->title = $request->input('title');
        $tag->slug = $request->input('slug');
        $tag->save();
        return new RedirectResponse('/tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return new RedirectResponse('/tag');
    }
}