<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    //
    public function posts(){

        // La palabra "user" quiere decir que hay una relacion.
        // para utilizar load() tenemos que hacer la consulta primero.
        return view('posts', [
            'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    public function post(Post $post){
        return view('post', [
            'post' => $post
        ]);
    }
}
