@extends('layouts.app')

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
      <h2>Album: {{ $albums->nama_album }}</h2>
      <hr>
      <div class="row">
        @foreach ($galeris as $data) 
        <div class="col-md-4">
        <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
            <img src="{{ asset('images/'.$data->foto) }}" style="width:200px; height:150px"></a>
            <p><h5>{{ $data->nama_galeri }}</h5></p>
        </div>
        @endforeach
      </div>
      <div>{{ $galeris->links() }}</div>
    </div>
  </section>
@endsection