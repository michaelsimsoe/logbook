<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NoteTypeController;
use App\Http\Controllers\StandupController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $today = (new DateTime)->format('Y-m-d');
        $notes = auth()->user()->notes->where('created_at', '>', $today);
        $types = auth()->user()->noteTypes;

        return view('dashboard.note', ['notes' => $notes, 'types' => $types]);
    })->name('home');
    

    Route::get('/notes', [NotesController::class, 'index'])->name('notes');
    Route::post('/notes', [NotesController::class, 'store']);
    Route::delete('/notes/{note}', [NotesController::class, 'destroy'])->name('notes.destroy');
    Route::get('/notes/{note:id}', [NotesController::class, 'show'])->name('notes.single');
    Route::get('/notes/{note:id}/edit', [NotesController::class, 'edit'])->name('notes.edit');
    Route::patch('/notes/{note:id}', [NotesController::class, 'update']);

    // Route::get('/standup', function () {
    //     $today = (new DateTime)->format('Y-m-d');
    //     $notes = auth()->user()->notes->where('created_at', '>', $today);
    //     return view('dashboard.standup', compact('notes'));
    // })->name('standup');

    Route::get('/standup', [StandupController::class, 'current'])->name('standup');
    Route::get('/standup/all', [StandupController::class, 'index'])->name('standup.all');
    Route::get('/standup/new', [StandupController::class, 'create'])->name('standup.new');
    Route::get('/standup/last', [StandupController::class, 'lastStandup'])->name('standup.last');
    Route::get('/standup/{standup}', [StandupController::class, 'show'])->name('standup.show');
    Route::delete('/standup/{standup}', [StandupController::class, 'destroy'])->name('standup.destroy');
    Route::get('/standup/{standup}/edit', [StandupController::class, 'edit'])->name('standup.edit');
    Route::patch('/standup/{standup}/edit', [StandupController::class, 'update'])->name('standup.edit');
    Route::post('/standup/new', [StandupController::class, 'store'])->name('standup.store');

    Route::post('/notes/{note}/comment', [CommentController::class, 'store'])->name('comment.store');

    Route::get('/tags', [TagController::class, 'index'])->name('tags');

    Route::get('/note_types', [NoteTypeController::class, 'index'])->name('note_types');
    Route::post('/note_types', [NoteTypeController::class, 'store'])->name('note_types');
});
require __DIR__.'/auth.php';
