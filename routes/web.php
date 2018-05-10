<?php


Route::get('/', 'PostsController@index')->name('posts.index');

Route::get('posts/{post}', 'PostsController@show')->name('posts.show');

Auth::routes();


// CRUD - create - read - update - delete
// REST
// index    - GET    - /posts                - PostsController@index         - lista tutti i post
// show     - GET    - /posts/{post}         - PostsController@show          - mostra singolo post
// create   - GET    - /posts/create         - PostsController@create        - form creazione
// store    - POST   - /posts                - PostsController@store         - salva nuovo post
// edit     - GET    - /posts/{post}/edit    - PostsController@edit          - form modifica
// update   - PATCH  - /posts/{post}         - PostsController@update        - aggiorna post
// destroy  - DELETE - /posts/{post}         - PostsController@destroy       - cancella post
