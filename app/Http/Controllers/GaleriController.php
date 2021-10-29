<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Album;
use File;
use Image;
use Auth;

class GaleriController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $batas = 4;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($galeri->currentPage() - 1);
        return view('admin.galeri.index', compact('galeri', 'no'));    
    }

    public function create(){
        $album = Album::all();        
        return view('admin.galeri.create', compact('album'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_galeri'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|image|mimes:jpeg,jpg,png'
        ]);
        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan  = $request->keterangan;
        $galeri->id_album    = $request->id_album;
        $galeri->id_user     = Auth::id();

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
     
        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Foto berhasil disimpan');
    }

    public function edit($id){
        $album = Album::all();
        $galeri = Galeri::find($id);
        return view('admin.galeri.edit', compact('album', 'galeri'));
    }

    public function update(Request $request, $id){
        $galeri = Galeri::find($id);
        if ($request->has('foto')){
            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan  = $request->keterangan;
            $galeri->id_album    = $request->id_album;
    
            $foto = $request->foto;
            $namafile = time().'.'.$foto->getClientOriginalExtension();
         
            Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
            $foto->move('images/', $namafile);
    
            $galeri->foto = $namafile;
        }
        else{
            $galeri->nama_galeri = $request->nama_galeri;
            $galeri->keterangan  = $request->keterangan;
            $galeri->id_album    = $request->id_album;
        }

        $galeri->update();
        return redirect('/galeri')->with('pesan','Data Galeri Foto berhasil di update');
    }

    public function destroy($id){
        $galeri = Galeri::find($id);
        $namafile = $galeri->foto;
        File::delete('images/'.$namafile);
        File::delete('thumb/'.$namafile);
        $galeri->delete();
        return redirect('/galeri')->with('pesan', 'Data Galeri Foto berhasil di hapus');
    }

}
