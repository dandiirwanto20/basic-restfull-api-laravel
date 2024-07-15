<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kota;
use Illuminate\Support\Facades\DB;

class KotaController extends Controller
{
    //melihat data
    public function index()
    {
        $kota = Kota::all();
        return json_encode($kota);
    }
    //tambah rekaman
    public function tambah(Request $r)
    {
        $kota = new Kota();
        $kota->nama_kota = $r->nama_kota;
        $kota->propinsi_id = $r->propinsi_id;
        $kota->user_id = 1;
        $kota->save();
        return "Berhasil Menambah Kota";
    }
    //baca 1 rekaman tertentu
    public function baca($id)
    {
        $kota = Kota::find($id);
        return json_encode($kota);
    }
    //mengubah rekaman
    public function ubah(Request $r, $id)
    {
        $kota = Kota::find($id);
        $kota->nama_kota = $r->nama_kota;

        $kota->propinsi_id = $r->propinsi_id;
        $kota->user_id = 1;
        $kota->save();
        return "Berhasil Mengubah Kota";
    }
    //menghapus satu rekaman
    public function hapus($id)
    {
        $kota = Kota::find($id);
        if ($kota != null) {
            $kota->delete();
            return "Berhasil Menghapus Kota";
        } else {
            return "Data tidak ditemukan";
        }
    }
    //membaca tabel/rekaman propinsi
    public function propinsi()
    {
       return DB::table('propinsi')
            ->select('id', 'nama_propinsi')
            ->orderBy('nama_propinsi')
            ->get();
    }
}
