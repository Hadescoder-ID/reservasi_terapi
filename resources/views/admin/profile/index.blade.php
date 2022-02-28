@extends('partials.master')

@section('content')

<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Profile</h1>

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
                <form method="POST" action="{{ route('admin.profile.update', $id_user) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama: </label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{$profile->nama}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$profile->email}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Jenis Kelamin: </label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{($profile->jenis_kelamin == "laki-laki" ) ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="perempuan" {{($profile->jenis_kelamin == "perempuan" ) ? 'selected' : ''}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir: </label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{$profile->tgl_lahir}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_telp">No Telp: </label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{$profile->no_telp}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alamat">Alamat: </label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{$profile->alamat}}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>

                </form>
            </div>
        </div>
    </div>
</main>

@endsection