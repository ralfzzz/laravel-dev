<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
class Post
{
    // use HasFactory;
    private static $posts = [
    [
        'title' => 'Post 1',
        'slug' => 'post-1',
        'author' => 'Rifqi A',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur.'
    ],
    [
        'title' => 'Post 2 2',
        'slug' => 'post-2',
        'author' => 'Risa M',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam ullam minus sed ducimus alias quos odio! Reiciendis totam suscipit eius quibusdam quisquam possimus. Corporis, commodi blanditiis ea repudiandae ullam dolorum.'
    ]
    ];

    public static function all() {
        return collect(self::$posts);
    }

    public static function page3(){
        return static::all();
    }

    public static function post($slug){
        $content = static::all();
        // $one_item = [];
        // foreach ($content as $item) {
        //     # code...
        //     if ($item['slug'] === $slug) {
        //         # code...
        //         $one_item = $item;
        //     }
        // }

        return $content->firstWhere('slug', $slug);
        }

}
