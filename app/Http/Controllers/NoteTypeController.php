<?php

namespace App\Http\Controllers;

use App\Models\NoteType;
use Illuminate\Http\Request;

class NoteTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = auth()->user()->noteTypes;
        return view('dashboard.note_types', ['types' => $types]);
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
            'name' => 'required',
            ]);
        $attributes['user_id'] = auth()->id();

        NoteType::create($attributes);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoteType  $noteType
     * @return \Illuminate\Http\Response
     */
    public function show(NoteType $noteType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoteType  $noteType
     * @return \Illuminate\Http\Response
     */
    public function edit(NoteType $noteType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoteType  $noteType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoteType $noteType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoteType  $noteType
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoteType $noteType)
    {
        //
    }
}
