@extends('layouts.app')

@section('content')

<h2>Create a new article</h2>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    </div>

    <div class="form-group">
        <label for="">Category</label>
        <select class="form-control" name="category_id">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == old('category_id')) selected="" @endif>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="preview">Preview</label>
        <textarea class="form-control" name="preview" rows="3">{{ old('preview') }}</textarea>
    </div>

    <div class="form-group">
        <label for="body">Article</label>
        <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
    </div>

    <div class="form-group">
        <label for="">Tags</label>
        <select class="form-control" name="tags[]" multiple="">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tags', []))) selected="" @endif>{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Publish article</button>
</form>

@stop
