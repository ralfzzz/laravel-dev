<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
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

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('page2',[
//         'title' => 'Post Category: '.$category->name,
//         // 'posts' => Post::find($slug)
//         'posts' => $category->posts->load(['author','category']),
//         // 'category' => $category->name,
//        ]);
// });

Route::get('/category', function () {
    return view('category',[
        'title' => "All Category",
        // 'posts' => Post::find($slug)
        'categories' => Category::all(),
        // 'category' => $category->name
       ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('authors',[
        'title' => "Posts by: ".$author->name,
        // 'posts' => Post::find($slug)
        'posts' => $author->posts->load(['author','category']),
       ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::Resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');



















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
//clockwork library untuk melihat optimasi website yang diintal di laravel
//eager loading
//eager loading di controller dengan menambahkan method with(['a','b'])
//lazy eager loading ketika routes model bindings; menambahkan ->load(['a','b'])
//ditambahkan ketika query post karena satu post memiliki 1 author & category sehignga ketika ada post lain akan diulang dan menjadi n+1 problem

//REDESIGN UI
//bisa pakai bootstrap card
//pakai col-
//ada kondisi cek postingan @if blade ->count()
//bisa dibuat $with model agar bisa eager loading; dibuat dulu di modelnya;
//ada fungsi laravel diffForHumans(); menjadi bla bla bla ago; library carbon laravel
//ada api url generate random image di unsplah;
//ada methos skip di laravel @foreach untuk skip line
//untuk buat kotak mengambang label pakai position-absolute 
//collect() bisa untuk metod2 seperti map & implode sehingga array lebih mudah diolah;

//SEARCH & APGINATIONS
//menambahkan input search dengan form method get;
//untuk menangkap search pakai request('name')
//nantinya tidak pakai model controller category/author lagi tp langsung pakai posts + query
//yang disetup querynya
//di laravel ada yang namanya Query Builder untuk membentuk query db dengan ORM
//querynya itu TUGAS MODEL; ada yang namnya query scope LOKAL;
//scopeExample($query); query ini ngambil dari method sebelumnya ->
//buat method filternya di model baru dipakai di controller;
//sedangkan request itu tugas Controller
//when method dapat menggantikan method tp untuk collections; collect
//ada null coalecing operator mirip ternary operator tp khusus isset (??)
//ada query join method yaitu whereHas
//untuk menerapkan fitur tambahkan di view posts/page2
//dihubungkannya ada di model tp logic inputnya dengan request url
//urlnya untuk membuat 2 request get url ditambahkan dengan tag form dan input di html;
//logic2nya ada di controller ya
//untuk membuat pagination di laravel ada method ->paginate(jumlah_posting_tampil) untuk menampilkan yang diquery per page; ganti get() yang menampilkan semua;
//menmabhakna navigator linknya paginate; ambil query dan pakai method ->links()
//default laravel itu pakai tailwind kalau mau pakai bootstrap harus diconfig dulu di lravel
//ada method withQueryString untuk membawa apapun query string sebelumnya

//REGISTRATION&LOGIN VIEW
//untuk mengambil example bootstrap compact download examplenya trus pilih folder signinnya
//menambah navbar login tambah tag ul baru; supaya bisa pindah
//untuk panggil bootstrap icons pasang dulu librarinya karena tidak jasdi satu dengan bootstrapnya
//urutan buatnya route, controller, view
//atribut name html itu penting untuk submit data
//supaya lebih rapi bisa dibuat folder di view resourcenya
//data form di register disesuaikan dengan isi data db tabel user
//atribut id,type,name,label,placeholde; atribut yang penting untuk diperhatikan
//

//USER REGISTRATION
//di html form dikasih action ke "/login" & methodnya POST untuk mengisi form
//di routenya juga ganti jd POST; Route:post untuk mengambil data post
//buat methodnya id controller
//ada namnya @csrf cross-site-request-forgery; ngebajak request kita dr website orang lain
//masukkan @crfs di form view; @csrf = input hidden value crsf_token
//validasi isi form kosong atau batas karakter atau uniq atau email dns
//ada method ->validate([...]); ada beberapa rules di docs laravelnya;
//ada directrive blade instilahnya
//untuk memunculkan error pakai blade bisa pakai @error('name') atribut di html is-invalid @enderror
//di bootstrap ada clas invalid-feedback
// untuk memunculkan massege error validation laravel pakai blade {{ $message }};
//ada atribut required di html untuk lebih aman
//atribut value di form juga penting ges
//ada validate email dns di laravel
//ada blade utnuk atribut value {{ old('name') }}
//untuk memasukkan ke tb database pakai maggil model User::create($data);
//password pakai hash encryptions; 
//setelah registrasi ada method rerdirect di laravel untuk pindah ke login halaman
//redirect('/login)
//flash data session adalah mengirim data tp tidak get dr databse tp dikirim dari kontroller
//setelah itu datanya flash bisa diambil biasa kaya ngambil dr variabel dr db
//ada method has untuk cek has ->has('succes')
//untuk mengirim data session flas pakai session()->flash(array);
//untuk mengambil data flash session panggil method sessionnya; session('array_key')

//LOGIN & MIDDLEWARE
//di laravel ada fitur authentication
//ada plugin untuk login auth0 dan authe
//ada juga auth yang manual facades
//ingat kalau form submit pakai atribut action dan method; action mengarah ke route
//form jagan lupa @crfs
//atribut name, id, value dll penting ges
//bikin routesnya; method arah url
//includekan librarynya
//validate dulu seperti mau register ke db; logicnya mirip atribut required id html
//@error('email) => ketika input email tidak sesuai validate;
//istilahnya directive blade
//ketika lolos validate blum tentu emailnya/password sesuai
//Auth::attempt($credential); mencocokkan dengan db
//session fixation 
//method intentded dikasih supaya melewati middleware
//setelah auth berhasil atau gagal di if(Auth::attempt)
//masukkan flash error keterangan
//middleware berada di antara route dan controller
//ketika sudah login auth mengakses halaman untuk guest maka akan mengarah ke default; defautlt settingnya ada di app/provider
//directive blade bisa cek kalau udah login atau masih guest; menggunakan @auth @endauth
//auth berisi dan terhubung juga dnegan model user; atuh()->user()->namespace
//untuk logout butuh form juga
//dibuat route dan controller sendiri di loginController
//dikasih tau di route untuk user auth/guest yang bisa akses pagenya
//kalau ada user yang blum login mau akses user auth maka config dulu di //app/http/authentivate/ default halaman loginnya 
//mendefinisikan nama route dengan ->name('login')

//DASHBOARD UI
//kalau mau buat layouts dan partial buat semuanya dulu di main baru dipisah2
//kalau mau login/logout atau post pakai form button supaya kedetect sectionnya bisa memproses route middleware controller viewnya
//untuk CRUD ada route yang namanya REsource Controller
//routenya sudah masuk di Raoute::resource  Route::Resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
//ketika membuat resource controller bisa sekaliatn terhubung dengan model kita dengan menambahkan --model:Post --no-interaction
//active bar bisa pakai Request Request::is('dashboard/posts') ? 'active' : ''
//menghubungkan model query dengan where ('user_id', auth()->user()->id)->get();
//ada blade interactiv untuk @foreach $loop->interation
//ada route model binding getKeyRoute untuk mengkotumize default slug dimasukkan ke model
//

//POST FORM DASHBOARD
//untuk membuat link form tambah data pakai /dashboard/posts/{{ create }} createnya default
//atribut atribut di input form penting ya seperti id,name,value,clas,type
//ada package di composer laravel namnya eloquent slugable untuk membuat slug
//ada yang namanya fecth api js
//$slug = SlugService::createSlug(Post::class, 'slug', $request->title); untuk mengubah dan mengecke titile menjadi sebuah slug
//ada namanya trix editor untuk membuat format form input editor text
//hilangkan tombol file upload di trix editor
//

//VALIDATE & INSERT POST
//sebelum insert ke db baut validate di laravel dulu
//blade directive {{ old('naem') }}
//ada library laravel untuk melimit string
//fungis php strip_tags()
//->with('succes','messafe') mengirim flash message
//

//EDIT & DELETE POST
//kalau mau pakai method post/put pakai form
//tag a href defaultnya method get
//untuk delte pakai Post::destroy(id)
//kenapa slug dikrim karena defaultnya getKeyRoute diganti slug
//edit untuk menampilkan viewnya dan update untuk mengupdate db
//ada bldae interactive @method('put') untuk mengubah method yang html nda bisa hnya post/get
//delte dikasih alert untuk pertimbangan lagi
//mengakali jika slug tidak diubah tetapi tetap mau diupdate sama; sedangkan slug harus uniq
//untuk update Post::where('id', 1)->update($var); update dengan ORM
//

//UPLOAD IMAGE
//untuk membuat form bisa mengambil file & upload tambahkan atribut enctype="multipart/form-data" di tag form
//cara method simpan filenya $request->file('name input')->store('folder')
//ada dokumentasi file storeage di laravel yang menjelaskan library flysystem; library untuk menyimpan file
//untuk config ada di /config/filesystem.php
//secara default disimapan di local tetapi tidak bisa diakses publik, makanya oerlu s=disetup supaynya simpanya di storage/public
//setup dengan di .env dengan FIL:ESAYSTEM_DRIVEr=public
//untuk integrasi direktori storage/public dan public/storang gunakan yang namnya simbolic link; php artisan storage:link
//ada aturan validasi untuk file; validate('file|max)
//file image ngga wajib jd dibuat login
//jika ada file gambar maka tampilka jika tidak tampilkan gambar squash
//cara nampilkan gambar public dengan alamat '/storage/{{ data image di database }}'
//file('image yg dikirim request')->stror('tempat save') selain save dia akan mengembalikan nama gambar dan tempat menyimpannya semisal post_images/asdfasdf.jpg
//untuk menampilkan image di db pakai method blade directive dengan asset('storage/{{ $variabel kolom image di database yang disimpan method file()->store }})
//

//PREVIEW, UPDATE, DELETE IMAGE
//bisa dibuat logic untuk menampilkan image setelah memiolih akan diupload
//preview dibuat dengan bantuan fungsi javascript
//document ectype untuk form supaya bisa baca file
//logic edit ketika akan diganti gambar makan gambar yang lama dihapus dulu
//ketika post di delete buat logic gamabr yang di storage juga delet
//