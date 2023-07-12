<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;


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

Route::get('/page', function () {
    return view('page', [
        'title' => 'Page',
        'nama' => 'Rifqi Aziz',
        'haha' => 'hahahaha'
    ]);
});

Route::get('/page2', [PostController::class, 'index']);
    // $content_page2 = [  
    // ];

//halaman single post 
//{slug} disebut wild card untuk mengambil apapun isi dari slash
// Route::get('page2/post-1', function () {
Route::get('/page2/{post:slug}', [PostController::class, 'single']);
    // $slug = 'post-1';
    
    // return view('page2_1',[
    //     'title' => 'Page2_1',
    //     'posts' => Post::post($slug)
    //    ]);

Route::get('/page3', [PostController::class, 'page3']);

Route::get('/categories/{category:slug}', function(Category $category){
    return view('page2',[
        'title' => 'Post Category: '.$category->name,
        // 'posts' => Post::find($slug)
        'posts' => $category->posts,
        'category' => $category->name,
       ]);
});

Route::get('/category', function () {
    return view('category',[
        'title' => "All Category",
        // 'posts' => Post::find($slug)
        'categories' => Category::all(),
        // 'category' => $category->name
       ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('page2',[
        'title' => "Posts by: ".$author->name,
        // 'posts' => Post::find($slug)
        'posts' => $author->posts,
       ]);
});

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
//migrate doang hanya nambah yang baru tidak merubah yg sudah ada
//kalau mau tambah column ke database/migration/ ke method up() tambahkan columnya
//ORM/Eloquent memetakan data dalam database ke dalam sebuah model; di db dan laravel ada perantara modelnya; ada ddi app/Models/...
//bisa CRUD
//User.php adalah yang merepresentasikan data di db;; active record patter; akan ditambahkan ketika dilakukan save;
//menggunkan php artisan tinker untuk interaksi dengan laravel;
//cara akses model ORM pakai tinker artisan ketik ${variabel bebas untuk menampung model sehingga bisa diakses melalui tinker} -> new {nama model yang ada di app/Model}
//untuk save data supaya bisa terinput ke db menggunakan $tes->save(); disave dulu baru aka nkeinput;
//untuk meng akses data di db melalui tinker menggunakan $tes->all(); data objeknya sudah dalam bentuk collecton jd sudah bisa menggunakan magic select di collection objek laravel;
//summary DATABASE(menguhubungkannya di .env), MIGRATION(setup CRUD-nya (database/migrations/....php)), ELOQUENT(ORM)(setup menghubungkan datanya /app/Models/User.php)

//MODELS
//<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam placeat, qui et exercitationem quo nemo praesentium voluptatibus odit tenetur corrupti ut consequatur.</p><p>Sed laudantium nisi necessitatibus ad sunt earum voluptates voluptatibus, molestiae eos placeat totam obcaecati fuga incidunt iure similique. Consequuntur debitis at ab porro illum! Vero rem ipsam expedita!</p>
// /Post::all();
// Post::create([
//     'title' => 'Page 4',
//     'excerpt' => 'Lorem ipsum dolor sit amet consectetur...',
//     'body' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam placeat, qui et exercitationem quo nemo praesentium voluptatibus odit tenetur corrupti ut consequatur.</p><p>Sed laudantium nisi necessitatibus ad sunt earum voluptates voluptatibus, molestiae eos placeat totam obcaecati fuga incidunt iure similique. Consequuntur debitis at ab porro illum! Vero rem ipsam expedita!</p>'
// )];
//php artisan mkae:model -m Post.....; akan menghasilkan model di app/Models & migration di database/migtations;
//membuat column tabel ada di database/migrations/{filenya};
//jika sudah setup php artisan migrate
//input data melalui php artisan tinker;$post = new Post; di save dulu baru akan masuk ke db;
//query tingker dengan post model Post::all();
//ada mass assignment; pakai method create; Post::create([...,])
//kecuali propertinya dapat diisi di model postnya
//pakai method guarded['']
//pakai $fillable / $guarded dulu baru bisa mass assgiment seperti create & update dkk
//Route MOdel Bindings
//ALURNYA berarti url diakses >> Route mengarahkan ke controller >> controller dengan method mengambil data db dengan mengarahkan ke Model & migration >> hasil db dikirim ke view oleh controller sehingga bisa diolah di view >> 

//RELATION ORM
//ada one to one; dan has many; method untuk menghubungkan 2 db berbeda;
//hubungkan post & cateogty dengan belongsTo / has Many; secara otomatis kategori akan masuk ke post; udah dijoin laravel;
//initnya menghubungkan du db dengan category_id dengan method2;

//DATABASE SEEDER
//butuh relasi foreign key untuk menghubungkan table model
//seeding untuk create data di db tetapi di buat mocking datanya dulu
//php artisan make:seeder {name}
//hubungkan antar model untuk foreign_id
//M itu ORM database (migrations & model), V itu view di resource, C itu (router & controler)

//FACTORY & FAKER
//factory untuk membuat mocking data dummy 
//ada di /database/{}factory
//di dalma laravel terdapat library faker fake()->{}
//php artisan make:factory {nama}
//faker diconfig di /config/app.php; diset di .env
//php artisan make:model -mfs (migrasi, factory, & seeder)
//di faker ada beberapa libray variabel random semisal nama , email, sentence, dkk
//php artisan db:seed; php artisan migrate:fresh --seed
//data terbaru ke controller; all() diganti menjadi latest()->get();
//bisa buat alias di model untuk menghubungkan antar tabel; 
//foreign id itu penting untuk menghubungkan model orm ya; namnya harus sesuai;

//N+1 Problem ORM QUERY
//query yang berlebih dikarenakan hubungan model orm, semisal ketika model post, auhtor, category saling berhubng, ketika post dipanggil dan membutuhkan data author & category untuk viewnya & foreach, maka query akan dilakukan setiap kali data author id=1 dipanggil view; ketika post dipanggil author blum diquery; harusnya satu kali run mengquery posts, authors, & categories sekaligus;
//lazy loading
//
