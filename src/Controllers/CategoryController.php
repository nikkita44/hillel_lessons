<?php

namespace Nico44\Controllers;
use Illuminate\Http\RedirectResponse;
use Nico44\Models\Category;

class CategoryController
{
    public function index()
    {
        $title = '<h1>Categories page</h1>';
        $categories = Category::all();

        /** @var $blade */
        //echo $blade->make('categories/index', compact('title', 'categories'))->render();
        return view('categories/index', compact('title', 'categories'));
    }

    public function show($id)
    {
        $title = '<h1>Categories page</h1>';
        $category = Category::find($id);

        return view('categories/show', compact('title', 'category'));
    }

    public function create()
    {
        $title = '<h1>Categories page</h1>';
        $category = new Category();

        /** @var $blade */
        //echo $blade->make('categories/adding_form', compact('category'))->render();
        return view('categories/adding_form', compact('title', 'category'));
    }

    public function store()
    {
        $request = request();

        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();
        return new RedirectResponse('/category');
    }

    public function edit($id)
    {
        $title = '<h1>Categories page</h1>';
        $category = Category::find($id);

        return view('categories/updating_form', compact('title', 'category'));
    }

    public function update()
    {
        $request = request();

        $category = Category::find($request->input('id'));
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->save();
        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return new RedirectResponse('/category');
    }
}