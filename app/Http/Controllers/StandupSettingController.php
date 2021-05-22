<?php

namespace App\Http\Controllers;

use App\Models\StandupSetting;
use Illuminate\Http\Request;

class StandupSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->standupSetting()->count() > 0) {
            $settings = auth()->user()->standupSetting()->get()->first();
            return view('dashboard.standup.standup-settings', compact('settings'));
        }
        $settings = false;
        return view('dashboard.standup.standup-settings', compact('settings'));
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
            'wakatime-api' => 'nullable',
            ]);


        if (auth()->user()->standupSetting()->count() < 1) {
            auth()->user()->standupSetting()->create($attributes);
        }

        
        return redirect()->route('standup-setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StandupSetting  $standupSetting
     * @return \Illuminate\Http\Response
     */
    public function show(StandupSetting $standupSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StandupSetting  $standupSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(StandupSetting $standupSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StandupSetting  $standupSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StandupSetting $standupSetting)
    {
        $attributes = $request->validate([
            'wakatime-api' => 'nullable',
            ]);


        auth()->user()->standupSetting()->update($attributes);

        
        return redirect()->route('standup-setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StandupSetting  $standupSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandupSetting $standupSetting)
    {
        //
    }
}
