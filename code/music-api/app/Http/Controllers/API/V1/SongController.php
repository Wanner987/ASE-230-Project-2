<?php

namespace App\Http\Controllers\API\V1;

use App\Models\song;
use App\Http\Requests\V1\StoresongRequest;
use App\Http\Requests\V1\UpdatesongRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SongCollection;
use App\Http\Resources\V1\SongResource;
use Illuminate\Http\Request;
use App\Filters\V1\SongFilter;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new SongFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return new SongCollection(song::paginate());
        } else {
            return new SongCollection(song::where($queryItems)->paginate());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresongRequest $request)
    {
        return new SongResource(song::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(song $song)
    {
        return new SongResource($song);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesongRequest $request, song $song)
    {
        $song->update($request->all());
        return new SongResource($song);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(song $song)
    {
        //
    }
}
