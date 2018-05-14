<article>
    <div class="card">
        <div class="card-header">
            <h4><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
            <small>by {{ $post->user->name }} on {{ $post->created_at->format('d/m/y H:i') }}</small>

            @can('update', $post)
                <div><a href="{{ route('posts.edit', $post) }}">Modifica</a></div>
            @endcan
        </div>
        <div class="card-body">
            <p>
                {{ $post->preview }}
            </p>

            @if($isSinglePost)

                <p>
                    {{ $post->body }}
                </p>

            @endif
        </div>
        <div class="card-footer">
            <small>
                in {{ $post->category->name }}
                #tags {{ join(', ', $post->tags->pluck('name')->toArray()) }}
            </small>
        </div>
    </div>
</article>
