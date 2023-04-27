<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\TodoController;
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

Route::get('/', function () {
    return view('welcome');
});
//Route::get("/todo",[TodoController::class,'index'])->name('todo.index');
//Route::get("/todo/create",[TodoController::class,'create'])->name('todo.create');
//Route::post("/todo/store",[TodoController::class,'store'])->name('todo.store');
//Route::delete("/todo/{id}",[TodoController::class,'destroy'])->name('todo.destroy');
Route::resource('/todo',TodoController::class);
