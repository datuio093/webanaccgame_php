<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController; 
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\NickController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\NaptheController;
use App\Http\Controllers\ThenapController;
use App\Http\Controllers\ChuyenTienController;


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

Route::get('/' , [IndexController::class,'home'])->name('trangchu');
Route::get('/home' , [IndexController::class,'homepage'])->name('');
// Route::get('/home' , [IndexController::class,'home'])->name('home');
Route::get('/dich-vu', [IndexController::class,'dich_vu'] ) -> name('dichvu');
Route::get('/dich-vu/{slug}', [IndexController::class,'dich_vu_con'] ) -> name('dichvucon');
Route::get('/danh-muc', [IndexController::class,'danh_muc'] ) -> name('danhmuc');
Route::get('/danh-muc-con/{slug}', [IndexController::class,'danh_muc_con'] ) -> name('danhmuccon');
Route::get('/danh-muc-con/acc-game/{slug}', [IndexController::class,'danh_muc_game'] ) -> name('danhmucgame');
Route::get('/danh-muc-con/acc/{ms}', [IndexController::class,'accgame'] ) -> name('accgame');
Route::get('/blogs', [IndexController::class,'blogs'] ) -> name('blogs');
Route::get('/blogs/huong-dan', [IndexController::class,'blogs_huong_dan'] ) -> name('blogs_huong_dan');
Route::get('/blogs/tin-game', [IndexController::class,'blogs_tin_game'] ) -> name('blogs_tin_game');
Route::get('/blog/{slug}', [IndexController::class,'blogs_detail'] ) -> name('blogs_detail');
Route::get('/video-highlight', [IndexController::class,'video_highlight'] ) -> name('video_highlight');
Route::post('/show_video', [IndexController::class,'show_video'] ) -> name('show_video');
Route::get('/myaccount', [IndexController::class,'nickofuser'] ) -> name('nickofuser');
Route::get('/mythenap', [IndexController::class,'thenapofuser'] ) -> name('thenapofuser');
Route::get('/profile', [IndexController::class,'profile'] ) -> name('profile');
Route::get('/napthe', [IndexController::class,'napthe'] ) -> name('napthe');
Route::get('/chuyentien', [IndexController::class,'chuyentien'] ) -> name('chuyentien');
Route::get('/muathe', [IndexController::class,'muathe'] ) -> name('muathe');
Route::resource('/buy', BuyController::class);
Route::resource('/napthe123', NaptheController::class);
Route::resource('/chuyentien123', ChuyenTienController::class);
// Route::post('/choose_category', [NickController::class,'choose_category'] )->name('choose_category');



Auth::routes();


Route::prefix('admin') -> middleware(['auth', 'isAdmin']) -> group(function() {
   
    Route::resource('/category', CategoryController::class);
    Route::resource('/slider', SliderController::class);
    Route::resource('/blog', BlogController::class);
    Route::resource('/video', VideoController::class);
    Route::resource('/accessories', AccessoriesController::class);
    Route::resource('/nick', NickController::class);
    Route::resource('/gallery', GalleryController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/thenap', ThenapController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/choose_category', [NickController::class,'choose_category'] )->name('choose_category');
    
    
});