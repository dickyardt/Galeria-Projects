@extends('template.master')

@section('content')
<div class="card">
  <div class="card-header">
     <h4>Manajemen User 
         <a href="{{ route('user.create') }}" class="btn btn-primary" style="float: right">
         <i class="fa fa-plus"></i> Tambah User</a>
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
            <th>Nama User</th>
            <th>Email</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($user as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->level }}</td>
            <td>
              <form action="{{ route('user.destroy', $data->id) }}" method="post">@csrf   
                <a href="{{ route('user.edit', $data->id) }}" class="btn btn-info">
                <i class="fa fa-pencil-alt"></i> Edit</a>
                <button  class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                <i class="fa fa-times"></i> Hapus</button>
              </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div style="float: right">{{ $user->links() }}</div>
  </div>
</div>
@endsection