@extends('layout')

@section('content')
    {!! $title !!}

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
                <td><a href="/category/{{$category->id}}/restore">Відновити</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>

    <a href="/category" class="btn btn-info">Список</a>

@endsection
