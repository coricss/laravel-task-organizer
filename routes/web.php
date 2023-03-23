<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodolistController;

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

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/', [TodolistController::class, 'index']);

Route::post('/todolist', [TodolistController::class, 'store'])->name('todolist.store');

Route::post('/update_done/{todo}', [TodolistController::class, 'update_done'])->name('todolist.update_done');

Route::post('/update_title/{todo}', [TodolistController::class, 'update_title'])->name('todolist.update_title');

Route::get('/delete/{todo}', [TodolistController::class, 'delete'])->name('todolist.delete');

Route::fallback(function () {
    return view('page_not_found');
});
