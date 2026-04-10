<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\TurmaController;

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
Route::get('/', function () {
    return view('welcome');
});

// ROTAS aLUNOS 
Route::get('/aluno', [AlunoController::class,'index'])->name('aluno.index'); //liga a rota ao controller
//Acessar o formulário
Route::get('/aluno/create', [AlunoController::class,'create'])->name('aluno.create'); 
//Submeter o formulário
Route::post('/aluno', [AlunoController::class,'store'])->name('aluno.store'); 
Route::delete('/aluno/{id}', [AlunoController::class,'destroy'])->name('aluno.destroy'); 
Route::post('/aluno/search', [AlunoController::class,'search'])->name('aluno.search'); 
Route::get('/aluno/edit/{id}', [AlunoController::class,'edit'])->name('aluno.edit'); 
Route::put('/aluno/update/{id}', [AlunoController::class,'update'])->name('aluno.update'); 

// ROTAS CURSOS 
// Versão reduzida para CursoController -> Resources
Route::resource('curso', \App\Http\Controllers\CursoController::class);
Route::get('curso/{curso}/turmas', [\App\Http\Controllers\TurmaController::class, 'index'])->name('curso.turmas');
Route::post('/curso/search', [\App\Http\Controllers\CursoController::class, 'search'])->name('curso.search');


//ROTAS TURMAS
Route::get('curso/{curso}/turmas/create', [\App\Http\Controllers\TurmaController::class, 'create'])->name('curso.turmas.create');
Route::resource('turma', \App\Http\Controllers\TurmaController::class);
Route::post('/turma/search', [\App\Http\Controllers\TurmaController::class, 'search'])->name('turma.search');





