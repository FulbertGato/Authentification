<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home',compact('brands'));
});


Route::get('/about', function () {
    return view('about');
});

Route::get('contact',[ContactController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  //  $users = User::all();
  $users = DB::table('users')->get();
  // dd($users);
    return view('admin.index');
})->name('dashboard');

//Category Controllers

route::get('/category/all',[CategoryController::class,'allCat'])->name('all.category');
route::post('/category/add',[CategoryController::class,'addCat'])->name('store.category');
route::get('/category/edit/{id}',[CategoryController::class,'Edit']);
route::post('/category/update/{id}',[CategoryController::class,'Update']);
route::get('/softdelete/category/{id}',[CategoryController::class,'Softdelete']);
route::get('/category/restore/{id}',[CategoryController::class,'Restore']);
route::get('/pdelete/category/{id}',[CategoryController::class,'Pdelete']);
//brand routes
route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
route::post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
route::get('/brand/edit/{id}',[BrandController::class,'Edit']);
route::post('/brand/update/{id}',[BrandController::class,'Update']);
route::get('/brand/delete/{id}',[BrandController::class,'Delete']);

// multi image
route::get('/multi/image',[BrandController::class,'Multpic'])->name('multi.image');
route::post('/multi/add',[BrandController::class,'StoreImg'])->name('store.image');

route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');

//admin all route
route::get('home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
route::get('add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');

// route about
route::get('home/About',[AboutController::class,'HomeAbout'])->name('home.about');
route::get('add/About',[AboutController::class,'AddAbout'])->name('add.about');
route::post('/store/About',[AboutController::class,'StoreAbout'])->name('store.about');
