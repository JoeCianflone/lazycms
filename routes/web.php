<?php


Route::get('/stream/{type}', 'StreamController@show')->name('stream.show');
Route::get('/posts/{slug}', 'StreamController@post')->name('stream.post');

Route::get('{slug?}/{deepUri?}', function($slug = null, $deepUri = null) {
    if (is_null($slug)) {
        return \App::call('App\Http\Controllers\StreamController@index');
    }

    return \App::call('App\Http\Controllers\PageController@index', compact('slug', 'deepUri'));
})->where('deepUri', '(.)*');
