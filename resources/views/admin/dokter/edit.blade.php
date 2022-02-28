@extends('partials.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-3">Edit Dokter dan Terapis</h1>

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
            <form method="POST" action="{{ route('admin.dokter.update', $dokter->id_dokter ) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama">Nama Lengkap :</label>
                    <input id="nama" class="form-control" type="text" name="nama" required autocomplete="new-nama" value="{{$dokter->nama}}" />
                </div>
                <div class="form-group">
                    <label for="nit">NIT :</label>
                    <input id="nit" class="form-control" type="text" name="nit" required autocomplete="new-nit" value="{{$dokter->nit}}" />
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin :</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">Jenis Kelamin</option>
                        <option value="perempuan" {{ $dokter->jenis_kelamin == "perempuan" ? "selected" : ""}}>Perempuan</option>
                        <option value="laki-laki" {{ $dokter->jenis_kelamin == "laki-laki" ? "selected" : ""}}>Laki-laki</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir :</label>
                    <input id="tgl_lahir" class="form-control" type="date" name="tgl_lahir" required autocomplete="new-tgl_lahir" value="{{$dokter->tgl_lahir}}" />
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor telfon :</label>
                    <input id="no_telp" class="form-control" type="number" name="no_telp" required autocomplete="new-no_telp" value="{{$dokter->no_telp}}" />
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" required autocomplete="new-alamat" class="form-control">{{$dokter->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="id_spesialis">Spesialis :</label>
                    <select name="id_spesialis" id="id_spesialis" class="form-control">
                        <option value="">Jenis Spesialis</option>
                        @foreach($spesialis as $dataSpesialis)
                        <option value="{{$dataSpesialis->id_spesialis}}" {{ $dataSpesialis->id_spesialis == $dokter->id_spesialis ? 'selected' : '' }}>{{$dataSpesialis->spesialis}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href='{{route("admin.dokter.index")}}'>Kembali</a>
            </form>
        </div>

    </div>

</main>

@endsection