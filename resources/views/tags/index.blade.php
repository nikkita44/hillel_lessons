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

        @forelse($tags as $tag)
            <tr>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>{{$tag->created_at}}</td>
                <td>{{$tag->updated_at}}</td>
                <td><a href="/tag/delete-tag.php?id={{$tag->id}}">Видалити</a></td>
                <td><a href="/tag/update-tag.php?id={{$tag->id}}">Оновити</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>

    <a href="/tag/create-tag.php" class="btn btn-primary">Додати</a>
@endsection
