@extends('layouts.master')

@section('content')

<main>

<div class="container-fluid px-4">
        <h1 class="mt-4">Reservasi Terapis</h1>

        @if (session('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('user.reservasi.store') }}">
                    @csrf
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                        <input id="id_user" type="hidden" name="id_user" value="{{ Auth::user()->id_user }}" />
                            <label for="id_dokter">Pilih Jadwal</label>
                            <select data-live-search="true" class="form-control" title="Pilih Jadwal" name="id_dokter">
                                @foreach ($jadwal as $dataJadwal)
                                <option value=" {{$dataJadwal->id_dokter}}">{{$dataJadwal->nama}} | {{$dataJadwal->hari}} | {{$dataJadwal->waktu}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="tanggal">Pilih Tanggal</label>
                            <input id="tanggal" class="form-control" type="date" name="tanggal" required autocomplete="new-date" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('user.reservasi.index') }}" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
    <div class="alert alert-danger">
            <ul>
                
                Note :
                <li><p> Reservasi akan dihapus otomatis oleh admin 1x24 jam</p></li>
                
            </ul>
        </div>
    <div class="card-body">
        <table class="table table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Dokter/Terapis</th>
              <th>Spesialis</th>
              <th>Tgl reservasi</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($table as $p)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{$p->nama}}<br/>
              NIT. {{$p->nit}}</td>
              <td>{{ $p->spesialis }}</td>
              <td>{{ date('d-m-Y', strtotime( $p->tanggal)) }}</td>
              <td>
                
                <form method="POST" action="{{ route('user.reservasi.destroy', $p->id_reservasi ) }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger d-inline">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</main>
@endsection