<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $id_user = Auth::user()->id_user;
        $profile = User::all()->where('id_user', $id_user)->first();
        // dd($user);

        return view('admin.profile.index', compact('id_user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);

    //     return view('admin.profil.index', [
    //         'user' => $user
    //     ]);
    // }

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
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'jenis_kelamin' => 'string|max:255',
            'tgl_lahir' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',

        ]);

        $input = $request->all();
        User::find($id)->update($input);

        return back()->with('success', ' Data telah diperbaharui!');
    }
}
