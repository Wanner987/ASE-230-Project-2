<?php

namespace App\Http\Controllers;

use App\Models\song;
use App\Http\Requests\StoresongRequest;
use App\Http\Requests\UpdatesongRequest;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresongRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesongRequest $request, song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(song $song)
    {
        //
    }
}
