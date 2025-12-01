<?php

namespace App\Http\Controllers\API\V1;

use App\Models\playlist;
use App\Http\Requests\V1\StoreplaylistRequest;
use App\Http\Requests\V1\UpdateplaylistRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PlaylistCollection;
use App\Http\Resources\V1\PlaylistResource;
use Illuminate\Http\Request;
use App\Filters\V1\PlaylistFilter;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PlaylistFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return new PlaylistCollection(playlist::paginate());
        } else {
            return new PlaylistCollection(playlist::where($queryItems)->paginate());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreplaylistRequest $request)
    {
        return new PlaylistResource(playlist::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(playlist $playlist)
    {
        return new PlaylistResource($playlist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateplaylistRequest $request, playlist $playlist)
    {
        $playlist->update($request->all());
        return new PlaylistResource($playlist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(playlist $playlist)
    {
        //
    }
}
