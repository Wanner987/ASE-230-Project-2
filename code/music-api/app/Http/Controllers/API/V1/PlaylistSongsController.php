<?php

namespace App\Http\Controllers\API\V1;

use App\Models\playlistSongs;
use App\Http\Requests\V1\StoreplaylistSongsRequest;
use App\Http\Requests\V1\UpdateplaylistSongsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PlaylistSongsCollection;
use App\Http\Resources\V1\PlaylistSongsResource;
use Illuminate\Http\Request;
use App\Filters\V1\PlaylistSongsFilter;

class PlaylistSongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PlaylistSongsFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return new PlaylistSongsCollection(playlistSongs::paginate());
        } else {
            return new PlaylistSongsCollection(playlistSongs::where($queryItems)->paginate());
        }
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
    public function store(StoreplaylistSongsRequest $request)
    {
        return new PlaylistSongsResource(playlistSongs::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(playlistSongs $playlistSongs)
    {
        return new PlaylistSongsResource($playlistSongs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(playlistSongs $playlistSongs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplaylistSongsRequest $request, playlistSongs $playlistSongs)
    {
        $playlistSongs->update($request->all());
        return new PlaylistSongsResource($playlistSongs);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playlistSongs $playlistSongs)
    {
        //
    }
}
