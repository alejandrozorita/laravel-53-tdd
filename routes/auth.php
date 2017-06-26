<?php
/**
 * Created by PhpStorm.
 * User: alejandro
 * Date: 24/6/17
 * Time: 22:16
 */

// Rutas que requieren autenticacion

/*
 *
 *
 * POSTS
 */
Route::get('posts/create', [
    'uses' => 'CreatePostController@create',
    'as'   => 'posts.create',
]);

Route::post('posts/create', [
    'uses' => 'CreatePostController@store',
    'as'   => 'posts.store',
]);