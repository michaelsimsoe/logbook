<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NoteTypeController;
use App\Models\Note;

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
    $types = auth()->user()->noteTypes;

    return view('dashboard.note', ['notes' => $notes, 'types' => $types]);
})->middleware(['auth'])->name('home');;

Route::get('/notes', [NotesController::class, 'index'])->middleware(['auth'])->name('notes');
Route::post('/notes', [NotesController::class, 'store'])->middleware(['auth']);
Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->middleware(['auth'])->name('notes.destroy');
Route::get('/notes/{note:id}', [NotesController::class, 'show'])->middleware(['auth']);
Route::get('/notes/{note:id}/edit', [NotesController::class, 'edit'])->middleware(['auth'])->name('notes.edit');
Route::patch('/notes/{note:id}', [NotesController::class, 'update'])->middleware(['auth']);

// Route::get('/notes/{note:id}', function (Note $note) {
//     ddd($note);
// })->middleware(['auth'])->name('home');;

Route::get('/tags', [TagController::class, 'index'])->middleware(['auth'])->name('tags');

Route::get('/note_types', [NoteTypeController::class, 'index'])->middleware(['auth'])->name('note_types');
Route::post('/note_types', [NoteTypeController::class, 'store'])->middleware(['auth'])->name('note_types');

require __DIR__.'/auth.php';
