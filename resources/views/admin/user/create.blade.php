@extends('partials.master')

@section('content')

<main>
    <div class="container-fluid px-4">

        <h1 class="mt-4">Tambah User</h1>

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
                <form method="POST" action="{{ route('admin.user.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama :</label>
                            <input type="text" name="nama" id="nama" class="form-control" :value="old('nama')">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email :</label>
                            <input type="email" name="email" id="email" class="form-control" :value="old('email')">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Konfirmasi Password :</label>
                            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Jenis kelamin :</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir :</label>
                            <input id="tgl_lahir" class="form-control" type="date" name="tgl_lahir" required autocomplete="new-tgl_lahir" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_telp">Nomor Telefon :</label>
                            <input id="no_telp" class="form-control" type="text" name="no_telp" required autocomplete="new-no_telp" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="isAdmin">Pilih Role :</label>
                            <select name="isAdmin" id="isAdmin" class="form-control">
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat :</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection