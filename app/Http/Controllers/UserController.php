<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $batas = 5;
        $user = User::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($user->currentPage() - 1);
        return view('admin.user.index', compact('user', 'no'));    
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required|confirmed|min:8',
            'email'=>'required|email|unique:users'
        ]);
        $user = New User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->level    = $request->level;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/user')->with('pesan', 'Data User berhasil disimpan');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        if($request->input('password')){
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->level    = $request->level;    
            $user->password = bcrypt($request->password);
        }
        else{
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->level    = $request->level;
    
        }
        $user->update();
        return redirect('/user')->with('pesan','Data User berhasil di update');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('pesan', 'Data User berhasil di hapus');
    }
}
