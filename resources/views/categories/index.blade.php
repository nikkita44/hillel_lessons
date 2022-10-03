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
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>

        @forelse($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td><a href="/category/{{$category->id}}/destroy">Видалити</a></td>
                <td><a href="/category/{{$category->id}}/edit">Оновити</a></td>
                <td><a href="/category/{{$category->id}}/show">Показати</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>

    <a href="/category/create" class="btn btn-primary">Додати</a>
@endsection
