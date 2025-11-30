<?php

namespace App\Http\Controllers\API\V1;

use App\Models\artist;
use App\Http\Requests\StoreartistRequest;
use App\Http\Requests\UpdateartistRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtistResource;
use App\Http\Resources\V1\ArtistCollection;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ArtistCollection(artist::all());
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
    public function store(StoreartistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(artist $artist)
    {
        return new ArtistResource($artist);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateartistRequest $request, artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artist $artist)
    {
        //
    }
}
