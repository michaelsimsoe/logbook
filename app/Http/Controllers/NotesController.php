<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use App\Models\NoteType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('tag')) {
            $tagId = $request->input('tag');

            $notes = Note::getNotesWithId($tagId);
        } else {
            $notes = auth()->user()->notes->sortByDesc('created_at');
        }
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
                $newTag = Tag::create(['name' => trim($tag)]);
                $note->tags()->attach($newTag);
            } else {
                $note->tags()->attach($t);
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
        return view('single', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $types = auth()->user()->noteTypes;

        $tags = $note->tags->map(function ($item, $key) {
            return $item->name;
        })->toArray();
        
        $tagString = implode(', ', $tags);

        return view('single-edit', ['note' => $note, 'types' => $types, 'tags' => $tagString]);
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
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
            ]);
        $note->update($attributes);
        
        $note->note_types_id = $request->input('type');
        
        
        $providedTags = explode(',', $request->input('tags'));
        $note->tags()->detach();
        foreach ($providedTags as $tag) {
            $t = Tag::where('name', trim($tag))->first();
            if (!$t) {
                $newTag = Tag::create(['name' => trim($tag)]);
                $note->tags()->attach($newTag);
            } else {
                $note->tags()->attach($t);
            };
        }
        
        $note->save();
        
        return redirect('/notes/'.$note->id)->with('status', 'The note has been updated!');
        ;
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
