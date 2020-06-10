@extends('layout')
@section('content')
@foreach($posts as $post)
    <h3 class="links">
        <a href="{{route('view-post', $post->id)}}">{{$post->title}}</a>
    </h3>
@endforeach
@endsection
