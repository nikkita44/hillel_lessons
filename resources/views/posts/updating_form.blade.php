@extends('layout')

@section('content')
    <form action="/post/update" method="POST">
        <input type="hidden" value="{{$post->id}}" name="id">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Some info</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$post->slug}}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Some more info</label>
            <input type="text" class="form-control" id="body" name="body" value="{{$post->body}}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id" value="{{$post->category_id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection