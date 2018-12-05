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
