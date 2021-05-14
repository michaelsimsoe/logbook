<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
        $standups = auth()->user()->standups;
        ddd($standups);
        return view('dashboard.standup.standup-all', compact('standups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::yesterday();
        $notes = auth()->user()->notes->where('created_at', '>', $date);
        if ($notes->count() < 1) {
            if (auth()->user()->notes->count() < 1) {
                $notes = null;
            } else {
                $lastRecordDate = auth()->user()->notes->sortByDesc('created_at')->first();
                $newDate = $lastRecordDate['created_at']->toDateString();
                $date = Carbon::create($newDate);
                $notes = auth()->user()->notes->where('created_at', '>', $newDate);
            }
        }

        return view('dashboard.standup.standup-new', ['notes' => $notes, 'yesterday' => $date->format('l j F Y')]);
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
            'date' => 'required',
            'done' => 'required',
            'doing' => 'required',
            'challenges' => 'required',
            ]);
        $attributes['user_id'] = auth()->user()->id;
        
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
        if ($standup->user_id != auth()->user()->id) {
            return back();
        }
    }

    public function current()
    {
        $today = (new DateTime())->format('Y-m-d');
        $date = Carbon::yesterday();
        $notes = auth()->user()->notes->where('created_at', '>', $date);

        if ($notes->count() < 1) {
            if (auth()->user()->notes->count() < 1) {
                $notes = null;
            } else {
                $lastRecordDate = auth()->user()->notes->sortByDesc('created_at')->first();
                $newDate = $lastRecordDate['created_at']->toDateString();
                $date = Carbon::create($newDate);
                $notes = auth()->user()->notes->where('created_at', '>', $newDate);
            }
        }

        try {
            $standup = Standup::where('user_id', auth()->user()->id)->whereDate('date', $today)->firstOrFail();
            // $standup = Standup::where('date', $today)->firstOrFail();
        } catch (ModelNotFoundException) {
            return redirect()->route('standup.new');
        }


        return view('dashboard.standup.standup', ['standup' => $standup, 'notes' => $notes, 'yesterday' => $date->format('l j F Y')]);
    }

    public function lastStandup()
    {
        try {
            // $standup = Standup::where('date', $today)->firstOrFail();
        } catch (ModelNotFoundException) {
            return redirect()->route('standup.new');
        }
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
