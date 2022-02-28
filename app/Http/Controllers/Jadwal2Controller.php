<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB
use App\Models\Jadwal;

class Jadwal2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jadwal = Jadwal::all(); 
        $jadwal2 = Jadwal::join('dokter', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
        ->join('spesialis', 'spesialis.id_spesialis', '=', 'dokter.id_spesialis')
         ->select(
            'jadwal.*',
            'dokter.nama',
            'dokter.nit',
            'dokter.jenis_kelamin',
            'dokter.tgl_lahir',
            'dokter.no_telp',
            'dokter.alamat',
            'dokter.id_spesialis',
            'spesialis.spesialis',)
        ->orderByRaw('FIELD(hari,"senin","selasa","rabu","kamis","jumat","sabtu","minggu")')
        ->get();
       
        $no = 1;

        return view('user.jadwal.index', compact('jadwal2' , 'no'));
    }
}
