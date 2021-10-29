@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Data Album 
         <a href="{{ route('album.create') }}" class="btn btn-primary" style="float: right">
         <i class="fa fa-plus"></i> Tambah Album</a>
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
            <th>Nama Album</th>
            <th>Url SEO</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($album as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->nama_album }}</td>
            <td>{{ $data->album_seo }}</td>
            <td><img src="{{ asset('images/'.$data->gambar) }}" style="width: 100px"></td>
            <td>
              <form action="{{ route('album.destroy', $data->id) }}" method="post">@csrf   
                <a href="{{ route('album.edit', $data->id) }}" class="btn btn-info">
                <i class="fa fa-pencil-alt"></i> Edit</a>
                <button  class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                <i class="fa fa-times"></i> Hapus</button>
              </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection