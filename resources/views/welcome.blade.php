@extends('layouts.app')

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
      <h2>Album</h2>
      <hr>
      <div class="row">
        @foreach ($album as $data)
        <div class="col-md-4">
            <a href="{{ route('galeri.foto', $data->album_seo) }}">
            <img src="{{ asset('images/'.$data->gambar) }}" style="width:200px; height:150px">
            <p>
                <h5>{{ $data->nama_album }}</h5></a>
                ({{ $data->photos->count() }} Foto)
            </p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection