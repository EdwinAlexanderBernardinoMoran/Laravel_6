<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
