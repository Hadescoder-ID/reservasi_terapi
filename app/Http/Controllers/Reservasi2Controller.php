<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\Jadwal; 
use App\Models\Spesialis;
use App\Models\Dokter;
use Illuminate\Support\Facades\Auth;

class Reservasi2Controller extends Controller
{

    public function __construct( )
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( )
    {
        // echo Auth::user()->id_user;

       
     
        $user = User::where('id_user',Auth::user()->id_user)->first();//select('id_user','=',$user);
        // $user = User::with('getUser')->where('id_user',Auth::user()->id_user)->first();

        // $spesialis = Spesialis::all();
        // $reservasi = Reservasi::join('users', 'reservasi.id_user', '=', 'users.id_user' )
        // ->join('dokter', 'reservasi.id_dokter', '=', 'dokter.id_dokter')
        // ->join('jadwal', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
        // ->join('spesialis', 'dokter.id_spesialis', '=', 'spesialis.id_spesialis')
        //     ->select(
        //         'reservasi.*',
        //         'dokter.nama',
        //         'dokter.nit',
        //         'spesialis.spesialis',
        //         'users.id_user',                                                                                                                                                                                                     
        //         'jadwal.hari',
        //         'jadwal.waktu',
        //         'jadwal.id_dokter',)
        // ->where('reservasi.id_user' ,'=', 'users.id_user')
        // ->get();
 
        $jadwal = Jadwal::join('dokter', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
        ->select(
            'dokter.nama',
            
            'jadwal.hari',
            'jadwal.waktu',
            'jadwal.id_dokter',)->get();
        $id_user = Auth::user()->id_user;
        $table = Reservasi::
         
        join('dokter','reservasi.id_dokter','=','dokter.id_dokter')
        ->join('users','reservasi.id_user','=','users.id_user')
        ->join('jadwal','dokter.id_dokter','=','jadwal.id_dokter')
        ->join('spesialis','dokter.id_spesialis','=','spesialis.id_spesialis')
        ->select('dokter.nama',
        'dokter.nit',
        'reservasi.id_reservasi',
        'spesialis.spesialis',
        'users.id_user',
        'reservasi.tanggal')
        ->where('users.id_user',$id_user)
        ->orderByRaw('FIELD(hari,"senin","selasa","rabu","kamis","jumat","sabtu","minggu")')
        ->distinct()->get();//,Auth::user()->id_user;
        $no = 1;
        // echo $table;
        // $users = User::all();
        return view('user.reservasi.index', compact('no', 'table', 'user' ,'jadwal' ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
              
        // $users = User::all();
        // $jadwal = Jadwal::join('dokter', 'jadwal.id_dokter', '=', 'dokter.id_dokter')
        // ->select(
        //     'dokter.nama',
            
        //     'jadwal.hari',
        //     'jadwal.waktu',
        //     'jadwal.id_dokter',)->get();
        // $spesialis = Spesialis::all();
        // // $users = User::all();
        // return view('user.reservasi.index', compact('jadwal', 'users' ));
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
