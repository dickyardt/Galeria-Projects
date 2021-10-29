@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Data Galeri Foto 
         <a href="{{ route('galeri.create') }}" class="btn btn-primary" style="float: right">
         <i class="fa fa-plus"></i> Tambah Galeri Foto</a>
     </h4>
  </div>
  <div class="card-body">
    @if(Session::has('pesan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @endif             
    <table class="table table-striped">
        <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Album</th>
            <th>Kontributor</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($galeri as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->nama_galeri }}</td>
            <td>{{ $data->albums->nama_album }}</td>
            <td>{{ $data->users->name }}</td>
            <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px"></td>
            <td>
              <form action="{{ route('galeri.destroy', $data->id) }}" method="post">@csrf   
                <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                <i class="fa fa-pencil-alt"></i> Edit</a>
                <button  class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                <i class="fa fa-times"></i> Hapus</button>
              </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div style="float: right">{{ $galeri->links() }}</div>
  </div>
</div>
@endsection