<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Tag;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = auth()->user()->words;
        return view('words.words', compact('words'));
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
            'word' => 'required',
            'meaning' => 'required',
            'description' => 'nullable',
            ]);
        
        $word = auth()->user()->words()->create($attributes);

        $providedTags = explode(',', $request->input('tags'));
        $providedTags = array_map(fn ($tag) => trim($tag), $providedTags);
        $providedTags = array_unique($providedTags);
        
        foreach ($providedTags as $tag) {
            $t = Tag::where('name', trim($tag))->first();
            if (!$t) {
                $newTag = Tag::create(['name' => trim($tag)]);
                $word->tags()->attach($newTag);
            } else {
                $word->tags()->attach($t);
            };
        }

        return redirect()->route('words.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        return view('words.words-show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        $tags = $word->tags->map(function ($item, $key) {
            return $item->name;
        })->toArray();
        
        $tagString = implode(', ', $tags);

        return view('words.words-edit', compact('word', 'tagString'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        $attributes = $request->validate([
            'word' => 'required',
            'name' => 'nullable',
            'description' => 'nullable',
            ]);

        $word->update($attributes);

        $providedTags = explode(',', $request->input('tags'));
        $providedTags = array_map(fn ($tag) => trim($tag), $providedTags);
        $providedTags = array_unique($providedTags);
        
        $word->tags()->detach();
        foreach ($providedTags as $tag) {
            $t = Tag::where('name', trim($tag))->first();
            if (!$t) {
                $newTag = Tag::create(['name' => trim($tag)]);
                $word->tags()->attach($newTag);
            } else {
                $word->tags()->attach($t);
            };
        }


        return redirect()->route('words.show', compact('word'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $word->delete();
        return redirect()->route('words.index');
    }
}
