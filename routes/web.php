<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/teste', function () {
    return view(view: 'aluno.list'); //resources/views/aluno/list.blade.php
});*/

Route::get('/aluno', [AlunoController::class,'index'])->name('aluno.index'); //liga a rota ao controller
//Acessar o formulário
Route::get('/aluno/create', [AlunoController::class,'create'])->name('aluno.create'); 
//Submeter o formulário
Route::post('/aluno', [AlunoController::class,'store'])->name('aluno.store'); 



