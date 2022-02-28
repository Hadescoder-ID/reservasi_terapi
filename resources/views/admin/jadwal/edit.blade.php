@extends('partials.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-3">Edit Jadwal Terapi</h1>

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

        <div class="card-body">
            <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id_jadwal ) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="hari">Pilih Hari</label>
                    <select name="hari" id="hari" class="form-control">
                        <option value="">Pilih Hari</option>
                        <option value="senin" {{$jadwal->hari == "senin" ? "selected" : ""}}>Senin</option>
                        <option value="selasa" {{$jadwal->hari == "selasa" ? "selected" : ""}}>Selasa</option>
                        <option value="rabu" {{$jadwal->hari == "rabu" ? "selected" : ""}}>Rabu</option>
                        <option value="kamis" {{$jadwal->hari == "kamis" ? "selected" : ""}}>Kamis</option>
                        <option value="jumat" {{$jadwal->hari == "jumat" ? "selected" : ""}}>Jum'at</option>
                        <option value="sabtu" {{$jadwal->hari == "sabtu" ? "selected" : ""}}>Sabtu</option>
                        <option value="minggu" {{$jadwal->hari == "minggu" ? "selected" : ""}}>Minggu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="waktu">Pilih jam :</label>
                    <input id="waktu" class="form-control" type="time" name="waktu" required autocomplete="new-waktu" value="{{$jadwal->waktu}}" />
                </div>
                <div class="form-group">
                    <label for="id_dokter">Pilih Dokter</label>
                    <select data-live-search="true" class="form-control" title="Pilih Dokter" name="id_dokter">
                        <option value="">Pilih dokter</option>
                        @foreach ($dokter as $dataDokter)
                        <option value="{{$dataDokter->id_dokter}}" {{ $dataDokter->id_dokter == $dataDokter->id_dokter ? 'selected' : '' }}>{{$dataDokter->nama}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href='{{route("admin.jadwal.index")}}'>Kembali</a>
            </form>
        </div>

    </div>

</main>

@endsection