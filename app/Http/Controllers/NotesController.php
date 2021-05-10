<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\NoteType;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = auth()->user()->notes->sortByDesc('created_at');
        return view('notes', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
    
        $attributes['user_id'] = auth()->id();
        $attributes['note_types_id'] = $request->input('type');
        
        $note = Note::create($attributes);

        $providedTags = explode(',', $request->input('tags'));
        foreach ($providedTags as $tag) {
            $t = Tag::where('name', trim($tag))->first();
            if (!$t) {
                $newTag = Tag::create(['name' => $tag]);
                $note->tags()->attach($newTag);
            } else {
                $note->tags()->attach($tag);
            };
        }


        $note->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $n = Note::find($note->id);
        $note->delete();
        return back();
    }
}
