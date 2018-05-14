@component('mail::message')
# Hello {{ $admin->name }}

The user {{ $post->user->name }} updated the post titled "{{ $post->title }}".

@component('mail::button', ['url' => route('posts.show', $post)])
See updated post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
