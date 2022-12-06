<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [StudentsController::class, 'index']);

Route::get('/form', [StudentsController::class, 'students_form']);

Route::post('/insert', [StudentsController::class, 'insertdata']);

Route::get('/edit/{id}', [StudentsController::class, 'edit']);

Route::post('/update/{id}', [StudentsController::class, 'update']);

Route::get('/delete/{id}', [StudentsController::class, 'destroy']);


