<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB
use App\Models\Spesialis;

class SpesialisController extends Controller
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
        // $spesialis = spesialis::all(); 
        $spesialis = Spesialis::latest()->paginate(5);
        $no = 1;

        return view('admin.spesialis.index', compact('spesialis', 'no'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spesialis.create');
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
            'spesialis' => 'required',

        ]);
        $input = $request->all();
        Spesialis::create($input);

        return back()->with('success', ' spesialis baru berhasil dibuat.');
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
        $spesialis = Spesialis::findOrFail($id);

        return view('admin.spesialis.edit', [
            'spesialis' => $spesialis
        ]);
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
            'spesialis' => 'required',

        ]);

        $spesialis = Spesialis::find($id)->update($request->all());
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
        $spesialis = Spesialis::find($id);

        $spesialis->delete();

        return back()->with('success', ' Penghapusan berhasil.');
    }
}
