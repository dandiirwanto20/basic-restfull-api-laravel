<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propinsi;

class PropinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Propinsi::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_propinsi' => 'required|string|max:255',
        ]);

        $propinsi = Propinsi::create([
            'nama_propinsi' => $request->nama_propinsi,
        ]);

        return response()->json($propinsi, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propinsi  $propinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Propinsi $propinsi)
    {
        return $propinsi;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propinsi  $propinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propinsi $propinsi)
    {
        $request->validate([
            'nama_propinsi' => 'required|string|max:255',
        ]);

        $propinsi->update([
            'nama_propinsi' => $request->nama_propinsi,
        ]);

        return response()->json($propinsi, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propinsi  $propinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propinsi $propinsi)
    {
        $propinsi->delete();

        return response()->json(null, 204);
    }
}
