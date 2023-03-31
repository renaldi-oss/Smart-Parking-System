<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaParkirResource;
use App\Models\AreaParkir;
use Illuminate\Http\Request;

class AreaParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return new AreaParkirResource(AreaParkir::all());
        return "Hello World";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AreaParkir $areaparkir)
    {
        return new AreaParkirResource($areaparkir);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AreaParkir $areaparkir)
    {
        $areaparkir->update($request->all());      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AreaParkir $areaparkir)
    {
        //
    }
}
