<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB
use App\Models\Dokter;
use App\Models\Spesialis;

class DokterController extends Controller
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

        $dokter = Dokter::join('spesialis', 'dokter.id_spesialis', '=', 'spesialis.id_spesialis')
            ->get();
        $no = 1;

        return view('admin.dokter.index', compact('dokter', 'no'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spesialis = Spesialis::all();
        return view('admin.dokter.create', compact('spesialis'));
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
            'nama' => 'required',
            'nit' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'id_spesialis' => 'required',

        ]);
        $input = $request->all();
        Dokter::create($input);

        return back()->with('success', ' dokter baru berhasil dibuat.');
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
        $dokter = Dokter::findOrFail($id);
        $spesialis = Spesialis::all();
        // $dokter = Dokter::findOrFail($id)
        //     ->join('spesialis', 'dokter.id_spesialis', '=', 'spesialis.id')
        //     ->get();

        return view('admin.dokter.edit', compact('dokter', 'spesialis'));
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
            'nama' => 'required',
            'nit' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'id_spesialis' => 'required',

        ]);

        $dokter = Dokter::find($id)->update($request->all());
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
        $dokter = Dokter::find($id);

        $dokter->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
