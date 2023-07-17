<?php

use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\website;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\ProblemEmail;

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


Auth::routes();

Route::get('/', [ViewController::class, 'all'])->name('all');

Route::get('/home', [ViewController::class, 'index'])->name('home');

Route::get('/myticket', [ViewController::class, 'myticket'])->name('myticket');

Route::post('/post/store', [ProblemController::class, "store"])->name('post.store');

Route::get('/getproblem/{prob_id}', [ProblemController::class, "getproblem"]);

Route::post('/update/answer', [ProblemController::class, "updateanswer"])->name('update.answer');

