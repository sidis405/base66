@extends('layouts.app')

@section('content')

    <h2>Latest Posts ({{ $posts->total() }})</h2>

    {{ $posts->links() }}

    @foreach($posts as $post)
        @include('posts._post', ['isSinglePost' => false])
    @endforeach

    {{ $posts->links() }}

@stop
