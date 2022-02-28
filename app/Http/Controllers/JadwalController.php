<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB
use App\Models\Jadwal;
use App\Models\Dokter;
use App\Models\Spesialis;

class JadwalController extends Controller
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
        $jadwal = Jadwal::join('dokter', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
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

        return view('admin.jadwal.index', compact('jadwal' , 'no'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = Jadwal::all();
        $dokter = Dokter::all(); 
        

        return view('admin.jadwal.create', compact('jadwal', 'dokter'  ));
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
            'waktu' => 'required',
            'hari' => 'required',
            'id_dokter' => 'required'

        ]);
        $input = $request->all();
        Jadwal::create($input);

        return back()->with('success', ' Jadwal baru berhasil dibuat.');
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
        $jadwal = Jadwal::findOrFail($id);
        $dokter = Dokter::all();
        
       
        return view('admin.jadwal.edit', compact('jadwal','dokter' ));
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
            'waktu' => 'required',
            'hari' => 'required',
            'id_dokter' => 'required',

        ]);

        $jadwal = Jadwal::find($id)->update($request->all());
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
        $jadwal = Jadwal::find($id);

        $jadwal->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
