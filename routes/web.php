<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowHomePageController;
use App\Http\Controllers\ShowMovieHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActorPageController;
use App\Http\Controllers\MoviePageController;
use App\Http\Controllers\TheaterPageController;
use App\Http\Controllers\BookMovieController;
use App\Http\Controllers\MovieHomeController;
use App\Http\Controllers\ActorHomeController;

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



Auth::routes();
Route::get('admin/home', function () {
    return view('admin.home');
})->name('post');

Route::get('/',[ShowHomePageController::class,'index'])->name('homepage');
Route::resource('/home',ShowMovieHomeController::class);

Route::resource('movie_show',MovieHomeController::class);
Route::resource('actor_show',ActorHomeController::class);

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('/actor',[ActorPageController::class,'index'])->name('actor-details');
Route::post('/actor-save',[ActorPageController::class,'store'])->name('actor-save');
Route::get('/actor-create',[ActorPageController::class,'create'])->name('actor-create');

Route::get('/movie',[MoviePageController::class,'index'])->name('movies-details');
Route::post('/movies-save',[MoviePageController::class,'store'])->name('movies-save');
Route::get('/movies-create',[MoviePageController::class,'create'])->name('movies-create');

Route::post('/cast-save',[MoviePageController::class,'cast'])->name('cast-save');
Route::get('/cast-create',[MoviePageController::class,'create_cast'])->name('cast-create');

Route::get('/movie/{id}',[MoviePageController::class,'show']);
Route::get('/actor/{id}',[ActorPageController::class,'show']);

Route::get('/theatres-details',[TheaterPageController::class,'index'])->name('theatres-details');
Route::post('/theatres-save',[TheaterPageController::class,'store'])->name('theatres-save');
Route::get('/theatres-create',[TheaterPageController::class,'create'])->name('theatres-create');

Route::get('/city-create',[TheaterPageController::class,'createCity'])->name('city-create');
Route::post('/city-save',[TheaterPageController::class,'city'])->name('city-save');

Route::get('Seat-add',[TheaterPageController::class,'createSeat'])->name('seat-add');
Route::post('/seat-save',[TheaterPageController::class,'seat'])->name('seat-save');

Route::get('/book/{id}',[BookMovieController::class,'index']);
Route::post('/reserve',[BookMovieController::class,'reserve'])->name('ticket-save');
