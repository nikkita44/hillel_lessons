@extends('layout')

@section('content')
    <form action="/post/store" method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Some info</label>
            <input type="text" class="form-control" id="slug" name="slug">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Some more info</label>
            <input type="text" class="form-control" id="body" name="body">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <input type="text" class="form-control" id="category_id" name="category_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection