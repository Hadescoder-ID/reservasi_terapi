@extends('partials.master')

@section('content')

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Dokter dan Terapis</h1>
    <div class="card mb-4">
      <div class="card-header">
        <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary">
          <i class="fas fa-plus me-1"></i>
          Tambah dokter
        </a>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>No.</th>
              <th>Nama Lengkap</th>
              <th>NIT</th>
              <th>Spesialis</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Nomor Telfon</th>
              <th>Alamat</th>
              
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dokter as $d)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$d->nama}}</td>
              <td>{{$d->nit}}</td>
              <td>{{$d->spesialis}}</td>
              <td>{{$d->jenis_kelamin}}</td>
              <td>{{ date('d-m-Y', strtotime($d->tgl_lahir)) }}</td> 
              <td>{{$d->no_telp}}</td>
              <td>{{$d->alamat}}</td>
            
              <td>
                <a href="{{ route('admin.dokter.edit', $d->id_dokter) }}" class="btn btn-info">Edit</a> |
                <form method="POST" action="{{ route('admin.dokter.destroy', $d->id_dokter ) }}" class="d-inline">
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