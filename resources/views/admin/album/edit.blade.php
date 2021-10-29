@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Edit Album</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('album.update', $album->id) }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_album">Nama Album</label>
            <input type="text" class="form-control" name="nama_album" value="{{$album->nama_album}}">
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <br><img src="{{ asset('images/'.$album->gambar) }}" style="width: 100px"">
        </div>
        <div class="form-group">
            <label for="gambar">Ganti Gambar</label>
            <input type="file" class="form-control" name="gambar">
            <label>*) Apabila Gambar tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Update</button> 
          <a href="/album" class="btn btn-warning">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection