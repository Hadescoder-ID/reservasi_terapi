@extends('partials.master')

@section('content')

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Data User</h1>
    <div class="card mb-4">
      <div class="card-header">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
          <i class="fas fa-plus me-1"></i>
          Tambah User
        </a>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>no</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Jenis kelamin</th>
              <th>Tanggal Lahir</th>
              <th>No. Telfon</th>
              <th>Alamat</th>
              <th colspan="2">opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $u)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $u->nama }}</td>
              <td>{{ $u->email }}</td>
              <td>{{ $u->jenis_kelamin }}</td>
              <td>{{ date('d-m-Y', strtotime($u->tgl_lahir)) }}</td>
              <td>{{ $u->no_telp }}</td>
              <td>{{ $u->alamat }}</td>
              <td>
                <a href=" {{ route('admin.user.edit', $u->id_user) }}" class="btn btn-info">Edit</a>
                <form method="POST" action="{{ route('admin.user.destroy', $u->id_user ) }}" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Hapus</button>
                </form>
              </td>

              <!-- <td style="width: 100px"><button class="btn-success" "><a href=" {{ route('admin.user.edit', $u->id_user) }}">Edit</a></button></td>
              <form method="POST" action="{{ url('admin/user', $u->id_user ) }}">
                @csrf
                @method('DELETE')
                <td style="width: 100px"><button class="btn btn-danger">Hapus</button></td>
              </form>
              </td> -->
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

@endsection