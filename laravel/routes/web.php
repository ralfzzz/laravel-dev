<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/default', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home',[
        'title' => 'Home'
    ]);
});

Route::get('page', function () {
    return view('page', [
        'title' => 'Page',
        'nama' => 'Rifqi Aziz',
        'haha' => 'hahahaha'
    ]);
});

Route::get('page2', function () {
    $content_page2 = [
        [
            'title' => 'Post 1',
            'author' => 'Rifqi A',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur.'
        ],
        [
            'title' => 'Post 2',
            'author' => 'Risa M',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam ullam minus sed ducimus alias quos odio! Reiciendis totam suscipit eius quibusdam quisquam possimus. Corporis, commodi blanditiis ea repudiandae ullam dolorum.'
        ]
    ];
    return view('page2',[
        'title' => 'Page2',
        'posts' => $content_page2
    ]);
});

// di public untuk assets css, js, img, dll
// di resources/views sebagai setup tampilan yang akan ditampilkan supaya tidak berulang
// di routes web.php untuk mengarahkan akses alamatnya