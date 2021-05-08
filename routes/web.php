<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;

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
    $today = (new DateTime)->format('Y-m-d');
    $notes = auth()->user()->notes->where('created_at', '>', $today);

    return view('dashboard', ['notes' => $notes]);
})->middleware(['auth'])->name('home');;

Route::post('/notes', [NotesController::class, 'store'])->middleware(['auth']);
Route::get('/notes', [NotesController::class, 'index'])->middleware(['auth'])->name('notes');

require __DIR__.'/auth.php';
