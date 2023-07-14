<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        // dd(request('search'));

        // $posts = Post::latest();
        
        // if (request('search')) {
        //     $posts->where('title','like','%'.request('search').'%')
        //             ->orWhere('body','like','%'.request('search').'%');
        // }

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug',request('category'));
            $title = ' in '.$category->name;
        }

        return view('page2',[
            'title' => 'All Posts'.$title,
            // 'posts' => Post::all()
            'posts' => Post::latest()->filter(request(['search','category']))->paginate(4)->withQueryString()
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
