<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'Rifqi A',
        //     'email' => 'rifqia@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Maria R',
        //     'email' => 'mariar@gmail.com',
        //     'password' => bcrypt('54321')
        // ]);

        User::factory(3)->create();
        Post::factory(10)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Website',
            'slug' => 'website'
        ]);

        Category::create([
            'name' => 'House',
            'slug' => 'House'
        ]);

        // Post::create([
        //     'title' => 'Post 1',
        //     'slug' => 'post-1',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing...',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam quis voluptatem ea deleniti, neque non distinctio suscipit. Aliquid dolores ipsam pariatur tempore nulla magnam reprehenderit. Et saepe natus reprehenderit facilis iure dolore ullam consectetur fugiat provident deleniti veniam modi reiciendis beatae quos soluta quidem, rem tempora! Aperiam nihil voluptate nemo.',
        //     'category_id' => '1',
        //     'user_id' => '1'
        // ]);

        // Post::create([
        //     'title' => 'Post 2',
        //     'slug' => 'post-2',
        //     'excerpt' => 'Lorem ipsum 2, dolor sit amet consectetur adipisicing...',
        //     'body' => 'Lorem ipsum 2, dolor sit amet consectetur adipisicing elit. Ullam quis voluptatem ea deleniti, neque non distinctio suscipit. Aliquid dolores ipsam pariatur tempore nulla magnam reprehenderit. Et saepe natus reprehenderit facilis iure dolore ullam consectetur fugiat provident deleniti veniam modi reiciendis beatae quos soluta quidem, rem tempora! Aperiam nihil voluptate nemo.',
        //     'category_id' => '2',
        //     'user_id' => '2'
        // ]);
    }
}
