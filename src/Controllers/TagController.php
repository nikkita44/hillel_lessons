<?php

namespace Nico44\Controllers;
use Illuminate\Http\RedirectResponse;
use Nico44\Models\Tag;
use Illuminate\Validation\Rule;

class TagController
{
    public function index()
    {
        $title = '<h1>Tags page</h1>';
        $tags = Tag::all();

        return view('tags/index', compact('title', 'tags'));
    }

    public function trash()
    {
        $title = '<h1>Posts page</h1>';
        $tags = Tag::onlyTrashed()->get();

        return view('tags/trash', compact('title', 'tags'));
    }

    public function restore($id)
    {
        $tag = Tag::withTrashed()
            ->where('id', $id)
            ->restore();

        return new RedirectResponse('/tag');
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
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min: 4',
                'unique:tags,title'
            ],
            'slug' => ['required']
        ]);

        if($validator->fails()){
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new Tag();
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();

        $_SESSION['success'] = 'New tag was successfully created!';
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
        $data = request()->all();

        $tag = Tag::find($data['id']);
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min: 4',
                Rule::unique('tags', 'title')->ignore($tag->id)
            ],
            'slug' => ['required']
        ]);

        if($validator->fails()){
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag->save();

        $_SESSION['success'] = 'Tag was successfully updated!';
        return new RedirectResponse('/tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return new RedirectResponse('/tag');
    }

    public function forceDelete($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->forceDelete();

        return new RedirectResponse('/tag');
    }
}