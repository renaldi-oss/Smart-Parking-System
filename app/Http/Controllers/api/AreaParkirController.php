<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaParkirResource;
use App\Models\AreaParkir;
use Illuminate\Http\Request;
use App\Events\AreaParkirUpdated;
use Livewire\Livewire;

class AreaParkirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // fire an global event
        event(new AreaParkirUpdated('test'));
        return 'ok';
        // return new AreaParkirResource(AreaParkir::all());
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
        // $request->validate([
        //     'status' => 'required|boolean'
        // ]);
        // $areaparkir->update([
        //     'status' => $request->status
        // ]);

        // set status to !status
        $areaparkir->update([
            'status' => !$areaparkir->status
        ]);

        event(new AreaParkirUpdated($areaparkir));

        return new AreaParkirResource($areaparkir);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AreaParkir $areaparkir)
    {
        //
    }
}
