@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Tambah Galeri Foto</h4>
  </div>
  <div class="card-body">
    @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
    @endif
    <form action="{{ route('galeri.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_galeri">Judul</label>
            <input type="text" class="form-control" name="nama_galeri">
        </div>
        <div class="form-group">
            <label for="id_album">Album</label>
            <select name="id_album" class="form-control">
              <option value="" selected>Pilih Album</option>
              @foreach ($album as $data)
                <option value="{{ $data->id }}">{{ $data->nama_album }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Simpan</button> 
          <a href="/galeri" class="btn btn-warning">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection