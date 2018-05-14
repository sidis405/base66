<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($post) {
    //         // dd($post);
    //         // $post->user_id = auth()->id();
    //     });
    // }


    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //setters - accessors -
    // public function getTitleAttribute($title)
    // {
    //     return strtoupper($title);
    // }

    //getters - mutators -
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    public function setCoverAttribute($cover)
    {
        $this->attributes['cover'] = $cover->store('covers');
    }

    public function getCoverAttribute($cover)
    {
        return ($cover) ?? 'covers/default.jpg'; //null coalescence operator
    }

    public function attachTags($request)
    {
        $this->tags()->sync($request->get('tags', []));
    }
}
