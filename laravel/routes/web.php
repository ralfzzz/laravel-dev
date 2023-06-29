<?php

// use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('page2', [PostController::class, 'index']);
    // $content_page2 = [  
    // ];

//halaman single post 
//{slug} disebut wild card untuk mengambil apapun isi dari slash
// Route::get('page2/post-1', function () {
Route::get('page2/{slug}', [PostController::class, 'single']);
    // $slug = 'post-1';
    
    // return view('page2_1',[
    //     'title' => 'Page2_1',
    //     'posts' => Post::post($slug)
    //    ]);

Route::get('page3', [PostController::class, 'page3']);



// di public untuk assets css, js, img, dll
// di resources/views sebagai setup tampilan yang akan ditampilkan supaya tidak berulang
// di routes web.php untuk mengarahkan akses alamatnya
//route get/apapun return view untuk menampikal views

//untuk buat layouts.main buat template misa lnavabr dimasukkan ke layouts trus pakai blade templating @yield('yang akan dipanggil')
//@yield bisa dipakai dipanggil di tiap2 views dengan @section('yg dipanggil')
//bisa lagi dibuat partials; memisahkan navbar sendiri dengan membuat direktori partials trus dipanggil di layouts template dengan include('partials.{yang dipanggil}')
//di routes selain mengarahkan alamat digunakan juga untuk mengirim data kemudian bisa dipanggil di alamat yang diarahkan dnenga menggunakan blade templatinmg {{  }}
//bisa memanggil konten hanya satu saja semisal di page2 ada dua konten bisa dipanggil satu saja dengan menggunakan konsep {slug}
//dibuat tag <a> kemudian diarahkan ke page yang sama tapi ditambah slug;
///page2/{slug} si slug ini mengambil get parameternya dan memnyimpan di callback function $slug
//main.blade.php (./css) realtif ternyata tidak bisa dipakai; kalau @"" blade temlate ngga usah pakai ;

//MODELS
//to generate models in lavael use "php artisan make:model Flight"
//models in app/models/...
//include models first using "use App\Models\Post;" to use
//in models using static functions "public/private static"
//to call static use static::; not $this->...; 
//theres collect function in laravel so change the array like magic, can use many functions
//

//CONTROLLERS
//to generate controllers in laravel use "php artisan make:controller UserController"
//controllers in app/Http/COntrollers ...Controller.php
//controller is called in the Routes web.php to show data
//add use App\Http\Controllers\PostController; first to use controller in web.php
//[PostController::class, 'index'] using that pattern to call controllers
//make class and and models in controllers to be called in web.php


//DATABASE
//untuk setup db di .env
//untuk membuat tabel tidak dengan heidimysql langunsg tp menggunakan "migration" di laravel
//MIGRATION mirip version control seperti git; melacak perubahan di db; melalui class di laravel
//untuk membuat/create migrasi/table menggunakan perintah php artisan migration; buat dulu file migratikon up() down() di database/migration
//di dalam file migration ada method up() dan down(); untuk create dan drop db; ngga laig pakai heidi/dbms
//...migration:rollback -> down(); migrate:fresh -> drop dulu dan create table;
//kalau mau tambah column ke database/migration/ ke method up() tambahkan columnya
//ORM/Eloquent memetakan data dalam database ke dalam sebuah model; di db dan laravel ada perantara modelnya; ada ddi app/Models/...
//bisa CRUD
//User.php adalah yang merepresentasikan data di db;; active record patter; akan ditambahkan ketika dilakukan save;
//menggunkan php artisan tinker untuk interaksi dengan laravel;
//cara akses model ORM pakai tinker artisan ketik ${variabel bebas untuk menampung model sehingga bisa diakses melalui tinker} -> new {nama model yang ada di app/Model}
//untuk save data supaya bisa terinput ke db menggunakan $tes->save(); disave dulu baru aka nkeinput;
//untuk meng akses data di db melalui tinker menggunakan $tes->all(); data objeknya sudah dalam bentuk collecton jd sudah bisa menggunakan magic select di collection objek laravel;
//summary DATABASE(menguhubungkannya di .env), MIGRATION(setup CRUD-nya (database/migrations/....php)), ELOQUENT(ORM)(setup menghubungkan datanya /app/Models/User.php)
