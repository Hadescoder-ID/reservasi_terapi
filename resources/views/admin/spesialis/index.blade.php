@extends('partials.master')

@section('content')

<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Spesialis Terapi</h1>
    <div class="card mb-4">
      <div class="card-header">
        <a href="{{ route('admin.spesialis.create') }}" class="btn btn-primary">
          <i class="fas fa-plus me-1"></i>
          Tambah spesialis
        </a>
      </div>
      <div class="card-body">
        <table class="table table-sm table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>No.</th>
              <th>Spesialis</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($spesialis as $s)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$s->spesialis}}</td>
              <td>
                <a href="{{ route('admin.spesialis.edit', $s->id_spesialis) }}" class="btn btn-info">Edit</a> |
                <form method="POST" action="{{ route('admin.spesialis.destroy', $s->id_spesialis ) }}" class="d-inline">
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