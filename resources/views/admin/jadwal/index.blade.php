@extends('partials.master')

@section('content')

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Jadwal Terapi</h1>
    <div class="card mb-4">
      <div class="card-header">
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary">
          <i class="fas fa-plus me-1"></i>
          Tambah Jadwal
        </a>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>No.</th>
              <th>Dokter / Terapis</th>
              <th>Spesialis</th>
              <th>Hari</th>
              <th>Jam Terapi</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jadwal as $p)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$p->nama}}</td>
              <td>{{$p->spesialis}}</td>
              <td>{{$p->hari}}</td>
              <td>{{$p->waktu}}</td>
              <td>
                <a href="{{ route('admin.jadwal.edit', $p->id_jadwal) }}" class="btn btn-info">Edit</a> |
                <form method="POST" action="{{ route('admin.jadwal.destroy', $p->id_jadwal ) }}" class="d-inline">
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
  </div>
</main>

@endsection