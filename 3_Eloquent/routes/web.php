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

        // El metodo user viene del modelo Post
        // Utilizamos get_title para convertir todo en mayuscula, esa config se ase en el modelo.
        echo "
        $post->id
        <strong>{$post->user->get_name}</strong>
        $post->get_title <br>";
    }
});

Route::get('users', function(){

    $users = User::get();
    // Cuando se usan varios niveles se encierran bajo llaves.

    foreach ($users as $user) {
        echo "
        $user->id
        <strong>{$user->get_name}</strong>
        {$user->posts->count()} posts <br>";
    }
});

Route::get('collections', function(){

    $users = User::all();

    // Lo que realmente viene en el sucede por detras
    // dd($users);

    // Lo usamos para verificar si existe dicho elemento, en este caso el elemeto n°4
    // dd($users->contains(9));

    // Quiero que me traigas todos los elementos excepto el 1,2 y 3
    // dd($users->except([1,2,3]));

    // Quiero que me traigas solo el elemento 4.
    // dd($users->only(4));

    // Quiero que me busques el elemento n°4
    // dd($users->find(4));

    // Este metodo sirve para realizar la carga de pors utilizando la carga del modelo port, con la palabra clave que pusimos en el modelo de POST, al momenton de relacionarlo, imprime todos los posts que tiene cada usuario.
    dd($users->load('posts'));
});
