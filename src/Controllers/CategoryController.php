<?php

namespace Nico44\Controllers;
use Illuminate\Http\RedirectResponse;
use Nico44\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController
{
    public function index()
    {
        $title = '<h1>Categories page</h1>';
        $categories = Category::all();

        return view('categories/index', compact('title', 'categories'));
    }

    public function trash()
    {
        $title = '<h1>Categories page</h1>';
        $categories = Category::onlyTrashed()->get();

        return view('categories/trash', compact('title', 'categories'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()
            ->where('id', $id)
            ->restore();

        return new RedirectResponse('/category');
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

        return view('categories/adding_form', compact('title', 'category'));
    }

    public function store()
    {
        $data = request()->all();
        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min: 4',
                'unique:categories,title'
            ],
            'slug' => ['required']
        ]);

        if($validator->fails()){
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();

        $_SESSION['success'] = 'New category was successfully created!';
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
        $data = request()->all();

        $category = Category::find($data['id']);
        $category->title = $data['title'];
        $category->slug = $data['slug'];

        $validator = validator()->make($data, [
            'title' => [
                'required',
                'min: 4',
                //'unique:categories,title',
                Rule::unique('categories', 'title')->ignore($category->id)
            ],
            'slug' => ['required']
        ]);

        if($validator->fails()){
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $category->save();

        $_SESSION['success'] = 'Category was successfully updated!';
        return new RedirectResponse('/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return new RedirectResponse('/category');
    }

    public function forceDelete($id)
    {
        $category = Category::find($id);
        $category->forceDelete();

        return new RedirectResponse('/category');
    }
}