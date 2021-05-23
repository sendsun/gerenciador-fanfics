<?php

use App\Http\Controllers\CapitulosController;
use App\Http\Controllers\FanficsController;
use App\Http\Controllers\LivrosController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/fanfics', [FanficsController::class, 'index'])->name('listar_fanfics');
Route::get('/fanfics/criar', [FanficsController::class, 'create'])->name('form_criar_fanfic');
Route::post('/fanfics/criar', [FanficsController::class, 'store']);
Route::delete('/fanfics/{id}', [FanficsController::class, 'destroy']);
Route::get('/fanfics/{id}/livros', [LivrosController::class, 'index']);
Route::post('/fanfics/{id}/editarnome', [FanficsController::class, 'editaNome']);
Route::get('/livros/{livro}/capitulos', [CapitulosController::class, 'index']);
Route::post('/livros/{livro}/capitulos/ler', [CapitulosController::class, 'ler']);

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

