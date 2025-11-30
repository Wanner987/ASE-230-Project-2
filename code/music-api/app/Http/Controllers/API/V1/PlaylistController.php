<?php

namespace App\Http\Controllers\API\V1;

use App\Models\playlist;
use App\Http\Requests\StoreplaylistRequest;
use App\Http\Requests\UpdateplaylistRequest;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
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
    public function store(StoreplaylistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplaylistRequest $request, playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playlist $playlist)
    {
        //
    }
}
