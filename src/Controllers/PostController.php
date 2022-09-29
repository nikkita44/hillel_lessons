<?php

namespace Nico44\Controllers;
use Illuminate\Http\RedirectResponse;
use Nico44\Models\Post;

class PostController
{
    public function index()
    {
        $title = '<h1>Posts page</h1>';
        $posts = Post::all();

        return view('posts/index', compact('title', 'posts'));
    }

    public function show($id)
    {
        $title = '<h1>Posts page</h1>';
        $post = Post::find($id);

        return view('posts/show', compact('title', 'post'));
    }

    public function create()
    {
        $title = '<h1>Posts page</h1>';
        $post = new Post();

        return view('posts/adding_form', compact('title', 'post'));
    }

    public function store()
    {
        $request = request();

        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->save();
        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $title = '<h1>Posts page</h1>';
        $post = Post::find($id);

        return view('posts/updating_form', compact('title', 'post'));
    }

    public function update()
    {
        $request = request();

        $post = Post::find($request->input('id'));
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->save();
        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return new RedirectResponse('/post');
    }
}