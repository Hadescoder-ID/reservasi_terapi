@extends('layouts.master')

@section('content')

<main>
  <div class="container-fluid px-4 ">
        <h1 class="mt-4">Jadwal Terapis</h1>
      <div class="card-body">
        <table class="table table-striped table-bordered">
          <thead class="bg-dark text-white">
            <tr>
              <th>No.</th>
              <th>Jam Terapi</th>
              <th>Hari</th>
              <th>Dokter / Terapis</th>
              <th>Spesialis</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($jadwal2 as $s)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$s->waktu }}</td> <!--format('g:i a') -->
              <td>{{$s->hari}}</td>
              <td>{{$s->nama}}<br/>
              NIT. {{$s->nit}}</td>
              <td>{{$s->spesialis}}</td>
               
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
</main>

@endsection