<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

Route::get('eloquent', function(){

    // $posts = Post::all(); trae todos los post

    // $posts = Post::where('id', '>=', '20')->get(); trae los post todos los que sean mayor a dicha condicion.


    // Aqui con orderBy los ordena de manera descendente
    // El metodo take, solo trae 3 archivos de dicha tabla.
    $posts = Post::where('id', '>=', '20')->orderBy('id', 'desc')->take(3)->get();

    foreach ($posts as $post) {
        echo "$post->id $post->title <br>";
    }
});


Route::get('posts', function(){

    $posts = Post::get();
    // Cuando se usan varios niveles se encierran bajo llaves.

    foreach ($posts as $post) {
        echo "
        $post->id

        <strong>{$post->user->name}</strong>
        $post->title <br>";
    }
});

Route::get('users', function(){

    $users = User::get();
    // Cuando se usan varios niveles se encierran bajo llaves.

    foreach ($users as $user) {
        echo "
        $user->id

        <strong>{$user->name}</strong>
        {$user->posts->count()} posts <br>";
    }
});
