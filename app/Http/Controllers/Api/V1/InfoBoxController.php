<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\InfoBoxResource;
use App\Models\InfoBox;
use App\Repositories\InfoBoxRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InfoBoxController extends V1Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(InfoBoxRepository $repository): AnonymousResourceCollection
    {
        return InfoBoxResource::collection($repository->getFrontpageBoxes());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO: Implement this functionality.
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoBox $infoBox): InfoBoxResource
    {
        return new InfoBoxResource($infoBox);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InfoBox $infoBox)
    {
        // TODO: Implement this
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InfoBox $infoBox)
    {
        // TODO: Implement this
    }
}
