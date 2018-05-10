@extends('layouts.app')

@section('content')

    <h2>Latest Posts ({{ $posts->total() }})</h2>

    {{ $posts->links() }}

    @foreach($posts as $post)
        <article>
            <div class="card">
                <div class="card-header">
                    <h4>{{ $post->title }}</h4>
                    <small>by {{ $post->user->name }} on {{ $post->created_at->format('d/m/y H:i') }}</small>
                </div>
                <div class="card-body">
                    <p>
                        {{ $post->preview }}
                    </p>
                </div>
                <div class="card-footer">
                    <small>
                        in {{ $post->category->name }}
                        #tags {{ join(', ', $post->tags->pluck('name')->toArray()) }}
                    </small>
                </div>
            </div>
        </article>
    @endforeach

    {{ $posts->links() }}

@stop
