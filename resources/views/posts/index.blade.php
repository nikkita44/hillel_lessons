@extends('layout')

@section('content')
    {!! $title !!}

    @isset($_SESSION['success'])
        <div class="alert alert-success" role="alert">
            {{ $_SESSION['success'] }}
        </div>
    @endisset
    @php
        unset($_SESSION['success']);
    @endphp

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Tags</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>

        @forelse($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->tags->pluck('title')->join(', ')}}</td>
                <td>{{$post->created_at}}</td>
                <td>{{$post->updated_at}}</td>
                <td><a href="/post/{{$post->id}}/destroy">Видалити</a></td>
                <td><a href="/post/{{$post->id}}/edit">Оновити</a></td>
                <td><a href="/post/{{$post->id}}/show">Показати</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>

    <a href="/post/create" class="btn btn-primary">Додати</a>
@endsection
