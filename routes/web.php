<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::get('users', function () {
    return view('user.index', [
        'users' => (new \App\User)->all()
    ]);
});


/**
 * Protect route with middleware
 */
Route::get('admin', [
    'middleware' => [
        'auth',
        'role:administrator'
    ],
    'as' => 'admin',
    'uses' => function () {
        return view('admin');
    }
]);


/**
 * Protect closure with gate
 */
Route::get('hidden', [
    'middleware' => ['auth'],
    'as' => 'hidden',
    'uses' => function () {
        if (Gate::allows('view-hidden')) {
            return '<h1>Shh... This is something hidden</h1>';
        }
        abort(403, 'This is something secret, I can\'t show it.');
    }
]);


/**
 * Use gate as a middle ware
 */
Route::get('post-view/{post}', [
    'middleware' => ['can:view,post'],
    'as' => 'post-view-2',
    'uses' => function (\App\Post $post) {

        return view('post.show', ['post' => $post]);

    }
]);

