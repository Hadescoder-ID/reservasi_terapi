@extends('partials.master')

@section('content')

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Reservasi</h1>
    <div class="card mb-4">
      <div class="card-header">
        <a href="{{ url('/admin/reservasi/create') }}" class="btn btn-primary">
          <i class="fas fa-plus me-1"></i>
          Tambah Reservasi
        </a>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Data Pasin</th>
              <th>Dokter / Terapis</th>
              <th>Spesialis</th>
              <th>Tgl reservasi</th>
              <th>Hari</th>
              <th>Jam</th>
              
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($reservasi as $p)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $p->email }}<br/>{{ $p->no_telp }}<br/>{{ $p->alamat }}</td>
              <td>{{ $p->nama }}</td>
              <td>{{ $p->spesialis }}</td>
              <td>{{ date('d-m-Y', strtotime( $p->tanggal)) }}</td>
              <td>{{ $p->hari }}</td>
              <td>{{ $p->waktu }}</td>
              
              <td>
                <a href="{{ route('admin.reservasi.edit', $p->id_reservasi) }}" class="btn btn-info">Edit</a> |
                <form method="POST" action="{{ route('admin.reservasi.destroy', $p->id_reservasi ) }}" class="d-inline">
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