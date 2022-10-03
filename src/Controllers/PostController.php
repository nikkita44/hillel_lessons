<?php

namespace Nico44\Controllers;
use Illuminate\Http\RedirectResponse;
use Nico44\Models\Category;
use Nico44\Models\Post;
use Nico44\Models\Tag;
use Illuminate\Validation\Rule;

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
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts/adding_form', compact('title', 'post', 'categories', 'tags'));
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min: 5',
                'unique:posts,title'
            ],
            'slug' => ['required'],
            'body' => ['required', 'min: 7', 'max: 150'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);

        if($validator->fails()){
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new Post();
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->attach($data['tags']);

        $_SESSION['success'] = 'New post was successfully created!';
        return new RedirectResponse('/post');
    }

    public function edit($id)
    {
        $title = '<h1>Posts page</h1>';
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts/updating_form', compact('title', 'post', 'categories', 'tags'));
    }

    public function update()
    {
        $data = request()->all();

        $post = Post::find($data['id']);
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min: 5',
                Rule::unique('posts', 'title')->ignore($post->id)
            ],
            'slug' => ['required'],
            'body' => ['required', 'min: 7', 'max: 150'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'exists:tags,id']
        ]);

        if($validator->fails()){
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post->save();
        $post->tags()->sync($data['tags']);

        $_SESSION['success'] = 'Post was successfully updated!';
        return new RedirectResponse('/post');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();

        return new RedirectResponse('/post');
    }
}