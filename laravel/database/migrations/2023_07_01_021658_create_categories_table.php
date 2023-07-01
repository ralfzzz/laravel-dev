<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

// Post::create([
//     'category_id'=>2,
//     'title'=>'Post 3',
//     'slug'=>'post-3',
//     'excerpt'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
//     'body'=> 'Repellat, distinctio voluptates molestias architecto praesentium debitis ratione, doloribus iure, iusto tempore est! Quae nobis in blanditiis necessitatibus ullam temporibus rerum laudantium.'
// ])
