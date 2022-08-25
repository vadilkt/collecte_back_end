<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts=[
                'mon super titre de laravel',
                'mon deuxième super titre'
            ];
          

        return view('articles', [
            'posts'=>$posts
        ]);
        
    } 
}
