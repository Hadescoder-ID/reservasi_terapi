@extends('partials.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-3">Tambah Jadwal Terapi</h1>

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ url('admin/jadwal') }}">
                    @csrf
                    <div class="form-group">
                        <label for="hari">Pilih Hari</label>
                        <select name="hari" id="hari" class="form-control">
                            <option value="">Pilih Hari</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jum'at</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Pilih jam :</label>
                        <input id="waktu" class="form-control" type="time" name="waktu" required autocomplete="new-waktu" />
                    </div>
                    <div class="form-group">
                        <label for="id_dokter">Pilih Dokter</label>
                        <select data-live-search="true" class="form-control" title="Pilih Jadwal" name="id_dokter">
                            @foreach ($dokter as $dataDokter)
                            <option value="{{$dataDokter->id_dokter}}">{{$dataDokter->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href='{{route("admin.jadwal.index")}}'>Kembali</a>
                </form>
            </div>
        </div>
    </div>

</main>

@endsection