<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('anggota.index', compact('user'));

        // dd($user);
    }

    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('anggota.edit', compact('user'));
        // dd($user);
    }

    public function editprocess(Request $request)
    {
        //Find
        $post = User::findorfail(Auth::user()->id);

        //Input
        $post->nama_lengkap = $request->nama_lengkap;
        $post->nama_lapang = $request->nama_lapang;
        $post->nomor_induk = $request->nomor_induk;
        $post->nomor_wa = $request->nomor_wa;
        $post->alamat = $request->alamat;

        $post->id_angkatans = $request->id_angkatans;
        if ($request->id_angkatans > Angkatan::max('id') || $request->id_angkatans < Angkatan::min('id')) {
            return redirect('anggota/edit');
        }

        if(empty($request->id_angkatans) || $request->id_angkatans == 0 )
        {
            $post->id_angkatans = null;
        }

        $post->email = $request->email;
        $post->password = Hash::make($request->password);

        // Input Gambar
        if($request->file('gambar')){
            $gambar = $request->file('gambar');
            $name = $gambar->getClientOriginalName();
            $gambar->move('images/post/anggota', $name);
            $post->gambar = $name;
        }
        $post->update();

        return redirect('anggota')->with('status', 'Berhasil Ubah Data!');
    }

    public function destroy($id)
    {
        // DB::table('pakets')->where('id', $id)->delete();
        User::where('id', $id)->delete();
        return back()->with('status', "Anggota Dihapus dari Organisasi!");
    }

    public function remove($id)
    {
        $post = User::where('id', $id)->first();
        $post->id_angkatans = null;
        $post->update();

        return back()->with('status', "Anggota Dihapus dari Angkatan!");
    }

    public function upload()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (!empty($user->gambar)) {
            return redirect('home');
        }
        return view('auth.avatar', compact('user'));

    }

    public function uploadprocess(Request $request)
    {
        $post = User::where('id', Auth::user()->id)->first();
        if($request->file('gambar')){
            $gambar = $request->file('gambar');
            $name = $gambar->getClientOriginalName();
            $gambar->move('images/post/anggota', $name);
            $post->gambar = $name;
        }
        $post->save();

        return redirect('home');
    }
}
