<?php

namespace App\Http\Controllers;

use App\Models\Standup;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StandupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.standup.standup-new');
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
            'date' => 'required|unique:standups',
            'done' => 'required',
            'doing' => 'required',
            'challenges' => 'required|',
            ]);
        Standup::create($attributes);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Standup  $standup
     * @return \Illuminate\Http\Response
     */
    public function show(Standup $standup)
    {
    }

    public function current()
    {
        $today = (new DateTime())->format('Y-m-d');
        $yesterday = Carbon::yesterday();
        $notes = auth()->user()->notes->where('created_at', '>', $yesterday);

        try {
            // ddd('here');
            $standup = Standup::where('date', $today)->firstOrFail();
        } catch (ModelNotFoundException) {
            return redirect()->route('standup.new');
        }


        return view('dashboard.standup.standup', ['standup' => $standup, 'notes' => $notes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Standup  $standup
     * @return \Illuminate\Http\Response
     */
    public function edit(Standup $standup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Standup  $standup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Standup $standup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Standup  $standup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Standup $standup)
    {
        //
    }
}
