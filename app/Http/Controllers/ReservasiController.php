<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\Jadwal; 
use App\Models\Spesialis;
use App\Models\Dokter;

class ReservasiController extends Controller
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
        // $rev = Reservasi::groupBy('id_reservasi')
        //         ->having('id_reservasi', '>', 1)
        //         ->get();
        // $Reservasi = Reservasi::all(); x
        $reservasi = Reservasi::join('users','reservasi.id_user','=','users.id_user')
        ->join('dokter', 'reservasi.id_dokter','=','dokter.id_dokter')
        ->join('jadwal', 'dokter.id_dokter','=','jadwal.id_dokter')
        ->join('spesialis', 'dokter.id_spesialis','=','spesialis.id_spesialis')
            ->select(
                'reservasi.id_reservasi',
                'reservasi.tanggal',
                'dokter.id_dokter',
                'dokter.nama',
                'dokter.nit',
                'spesialis.spesialis',
                'users.email',
                'users.no_telp',
                'users.alamat',
                'jadwal.hari',
                'jadwal.waktu'
                
            )->groupBy('reservasi.id_reservasi')
            ->orderByRaw('FIELD(hari,"senin","selasa","rabu","kamis","jumat","sabtu","minggu")')
            ->orderBy('reservasi.id_reservasi')
            ->distinct()
            ->get();
            // echo $reservasi;
        $no = 1;
        return view('admin.reservasi.index', compact('reservasi', 'no'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $users = User::all();
        $jadwal = Jadwal::join('dokter', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
        ->select(
            'dokter.nama',
            
            'jadwal.hari',
            'jadwal.waktu',
            'jadwal.id_dokter',)->get();
        $spesialis = Spesialis::all();
        // $users = User::all();
        return view('admin.reservasi.create', compact('jadwal', 'users','spesialis' ));
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
            'tanggal' => 'required',
            
            'id_user' => 'required',
            'id_dokter' => 'required'
        ]);

        $input = $request->all();

        Reservasi::create($input);

        return back()->with('success', ' Reservasi baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservasi = Reservasi::findOrFail($id);

        $jadwal = Jadwal::join('dokter', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
        ->select(
            'dokter.nama',
            
            'jadwal.hari',
            'jadwal.waktu',
            'jadwal.id_dokter',)->get();
        $spesialis = Spesialis::all();
            
        $users = User::all();
        // $dokter = Dokter::all();
        $spesialis = Spesialis::all();

        return view('admin.reservasi.edit',  compact('jadwal', 'users'   ,'spesialis', 'reservasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            
            'id_user' => 'required',
            'id_dokter' => 'required'
        ]);

        Reservasi::find($id)->update($request->all());

        return back()->with('success', ' Data telah diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Reservasi = Reservasi::find($id);

        $Reservasi->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
