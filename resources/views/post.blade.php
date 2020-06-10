@extends('layout')
@section('content')
<h3>
    {{$post->title}}
</h3>
<div>
    {{$post->body}}
</div>
<div class="divider"></div>
<div class="responses">
    @foreach($post->responses as $response)
        <div>
            {{$response->body}}
        </div>
    @endforeach
</div>
@endsection
