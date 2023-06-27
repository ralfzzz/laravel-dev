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
            'slug' => 'post-1',
            'author' => 'Rifqi A',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur.'
        ],
        [
            'title' => 'Post 2',
            'slug' => 'post-2',
            'author' => 'Risa M',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam ullam minus sed ducimus alias quos odio! Reiciendis totam suscipit eius quibusdam quisquam possimus. Corporis, commodi blanditiis ea repudiandae ullam dolorum.'
        ]
    ];
    return view('page2',[
        'title' => 'Page2',
        'posts' => $content_page2
    ]);
});

//halaman single post 
//{slug} disebut wild card untuk mengambil apapun isi dari slash
// Route::get('page2/post-1', function () {
Route::get('page2/{slug}', function ($slug) {
    // $slug = 'post-1';
    $content_page2 = [
        [
            'title' => 'Post 1',
            'slug' => 'post-1',
            'author' => 'Rifqi A',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur.'
        ],
        [
            'title' => 'Post 2',
            'slug' => 'post-2',
            'author' => 'Risa M',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, consequatur. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam ullam minus sed ducimus alias quos odio! Reiciendis totam suscipit eius quibusdam quisquam possimus. Corporis, commodi blanditiis ea repudiandae ullam dolorum.'
        ]
    ];

    $one_item = [];
    foreach ($content_page2 as $item) {
        # code...
        if ($item['slug'] === $slug) {
            # code...
            $one_item = $item;
        }
    }

   return view('page2_1',[
    'title' => 'Page2_1',
    'posts' => $one_item
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