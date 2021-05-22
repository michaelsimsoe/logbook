<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Tag;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = auth()->user()->links;

        return view('links.links', compact('links'));
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
            'url' => 'required',
            ]);
        $link = auth()->user()->links()->create($attributes);

        $providedTags = explode(',', $request->input('tags'));
        foreach ($providedTags as $tag) {
            $t = Tag::where('name', trim($tag))->first();
            if (!$t) {
                $newTag = Tag::create(['name' => trim($tag)]);
                $link->tags()->attach($newTag);
            } else {
                $link->tags()->attach($t);
            };
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return view('links.links-show', compact('link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        $tags = $link->tags->map(function ($item, $key) {
            return $item->name;
        })->toArray();
        
        $tagString = implode(', ', $tags);

        return view('links.links-edit', compact('link', 'tagString'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $attributes = $request->validate([
            'url' => 'required',
            'name' => 'nullable',
            'description' => 'nullable',
            ]);

        $link->update($attributes);

        // TODO: remove duplicates
        $providedTags = explode(',', $request->input('tags'));
        $providedTags = array_map(fn ($tag) => trim($tag), $providedTags);
        $providedTags = array_unique($providedTags);

        $link->tags()->detach();
        foreach ($providedTags as $tag) {
            $t = Tag::where('name', trim($tag))->first();
            if (!$t) {
                $newTag = Tag::create(['name' => trim($tag)]);
                $link->tags()->attach($newTag);
            } else {
                $link->tags()->attach($t);
            };
        }

        $link->save();
        
        return redirect()->route('links.show', compact('link'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index');
    }
}
