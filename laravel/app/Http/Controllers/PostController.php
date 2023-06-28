<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('page2',[
            'title' => 'Page2',
            'posts' => Post::all()
        ]);
    }

    public function single($slug){
        return view('page2_1',[
            'title' => 'Page2_1',
            'posts' => Post::post($slug)
           ]);
    }

    public function page3(){
        return view('page3',[
            'title' => 'Page3',
            'posts' => Post::page3()
        ]);
    }
}
