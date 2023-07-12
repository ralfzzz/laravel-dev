<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return view('page2',[
            'title' => 'All Posts',
            // 'posts' => Post::all()
            'posts' => Post::latest()->get()
        ]);
    }

    public function single(Post $post){
        return view('page2_1',[
            'title' => 'Page2_1',
            // 'posts' => Post::find($slug)
            'posts' => $post
           ]);
    }

    public function page3(){
        return view('page3',[
            'title' => 'Page3',
            'posts' => Post::all()
        ]);
    }
}
