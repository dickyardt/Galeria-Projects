@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Edit Galeri Foto</h4>
  </div>
  <div class="card-body">
    <form action="{{ route('galeri.update', $galeri->id) }}" method="post" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nama_galeri">Judul</label>
            <input type="text" class="form-control" name="nama_galeri" value="{{$galeri->nama_galeri}}">
        </div>
        <div class="form-group">
            <label for="id_album">Album</label>
            <select name="id_album" class="form-control">
              @foreach ($album as $data)
                <option value="{{ $data->id }}"
                @if($data->id == $galeri->id_album)
                    selected
                @endif                    
                >{{ $data->nama_album }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{$galeri->keterangan}}</textarea>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <br><img src="{{ asset('thumb/'.$galeri->foto) }}" style="width: 100px"">
        </div>
        <div class="form-group">
            <label for="foto">Ganti Foto</label>
            <input type="file" class="form-control" name="foto">
            <label>*) Apabila Foto tidak diganti, kosongkan saja.</label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Update</button> 
          <a href="/galeri" class="btn btn-warning">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection