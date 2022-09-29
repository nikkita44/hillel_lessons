@extends('layout')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->slug}}</p>
    <p>{{$post->body}}</p>
    <p>{{$post->category_id}}</p>
@endsection