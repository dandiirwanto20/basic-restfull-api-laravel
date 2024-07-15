<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;

class BarangController extends Controller
{
    //melihat data
    public function index()
    {
        $barang = Barang::all();
        return response()->json($barang);
    }
    //baca 1 rekaman tertentu
    public function bacaBarangById($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    /**
     * Membaca barang berdasarkan jenis_id.
     *
     * @param  int  $jenis_id
     * @return \Illuminate\Http\Response
     */
    public function bacaBarangByJenis($jenis_id)
    {
        $barangs = Barang::where('jenis_id', $jenis_id)->get();

        return response()->json($barangs);
    }
}
