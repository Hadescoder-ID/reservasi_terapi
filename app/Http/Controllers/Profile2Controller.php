<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id_user;
        $user = User::all()->where('id_user', $id_user)->first();

        return view('user.profil.index', compact('user'));
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
