<?php

namespace App\Http\Controllers\API\V1;

use App\Models\artist;
use App\Http\Requests\V1\StoreartistRequest;
use App\Http\Requests\V1\UpdateartistRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ArtistResource;
use App\Http\Resources\V1\ArtistCollection;
use Illuminate\Http\Request;
use App\Filters\V1\ArtistFilter;


class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ArtistFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return new ArtistCollection(Artist::paginate());
        } else {
            return new ArtistCollection(Artist::where($queryItems)->paginate());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreartistRequest $request)
    {
        return new ArtistResource(artist::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(artist $artist)
    {
        return new ArtistResource($artist);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateartistRequest $request, artist $artist)
    {
        $artist->update($request->all());
        return new ArtistResource($artist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artist $artist)
    {
        //
    }
}
