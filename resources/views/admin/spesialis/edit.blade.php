@extends('partials.master')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-3">Edit Spesialis Terapi</h1>

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
            <form method="POST" action="{{ route('admin.spesialis.update', $spesialis->id_spesialis ) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="spesialis">Masukkan Spesialis :</label>
                    <input id="spesialis" class="form-control" type="text" name="spesialis" required autocomplete="new-spesialis" value="{{$spesialis->spesialis}}" />
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href='{{route("admin.spesialis.index")}}'>Kembali</a>
            </form>
        </div>

    </div>

</main>

@endsection