<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\User;
use App\Models\Reservasi;
use App\Models\Spesialis;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $dokter = Dokter::all()->count();
        $user = User::all()->count();
        $reservasi = Reservasi::all()->count();
        $spesialis = Spesialis::all()->count();
        return view('admin/home',compact('dokter','user','reservasi','spesialis'));
    }
}
