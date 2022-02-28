<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //  $profil = User::all(); 
        // $user = Auth::user()->id_user;
        // $profil = User::where('users',$user = ('id_user'));

        return view('user.profil.index');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.profil.index', [
            'user' => $user
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
