@extends('layout')

@section('content')
    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$category->title}}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Some info</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection