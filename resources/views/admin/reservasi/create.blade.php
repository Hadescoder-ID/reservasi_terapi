@extends('partials.master')

@section('content')

<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Reservasi</h1>

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
                <form method="POST" action="{{ route('admin.reservasi.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_user">Pilih User</label>
                            <select data-live-search="true" class="form-control show-menu-arrow" title="Pilih User" name="id_user">
                                @foreach ($users as $user)
                                @if($user->isAdmin != 1)
                                <option value="{{$user->id_user}}">{{$user->nama}} | {{$user->email}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="id_dokter">Pilih Jadwal</label>
                            <select data-live-search="true" class="form-control" title="Pilih Jadwal" name="id_dokter">
                                @foreach ($jadwal as $dataJadwal)
                                <option name="id_dokter" value=" {{$dataJadwal->id_dokter}}">{{$dataJadwal->nama}} | {{$dataJadwal->hari}} | {{$dataJadwal->waktu}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="tanggal">Pilih Tanggal</label>
                            <input id="tanggal" class="form-control" type="date" name="tanggal" required autocomplete="new-date" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.reservasi.index') }}" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection