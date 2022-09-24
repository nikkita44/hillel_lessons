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
                <td><a href="/category/delete-category.php?id={{$category->id}}">Видалити</a></td>
                <td><a href="/category/update-category.php?id={{$category->id}}">Оновити</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>

    <a href="/category/create-category.php" class="btn btn-primary">Додати</a>
@endsection
