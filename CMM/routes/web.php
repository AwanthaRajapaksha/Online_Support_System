<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ViewController;

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
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [ViewController::class, 'index'])->name('home');
Route::post('/post/store', [ProblemController::class, "store"])->name('post.store');
Route::get('/getproblem/{prob_id}', [ProblemController::class, "getproblem"]);
Route::get('/updateanswer/{prob_id}', [ProblemController::class, "updateanswer"]);
