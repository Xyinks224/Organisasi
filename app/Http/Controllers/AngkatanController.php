<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AngkatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $angkatans = Angkatan::all();

        $angkatan = Angkatan::where('id', Auth::user()->id_angkatans)->first();
        $users = User::where('id_angkatans', Auth::user()->id_angkatans)->get();

        return view('angkatan.index', compact('angkatan','angkatans', 'users'));
        // dd($angkatan, $users);
    }

    public function info($id)
    {
        $angkatan = Angkatan::where('id', $id)->first();
        $users = User::where('id_angkatans', $angkatan->id)->get();
        $count = User::where('id_angkatans', $angkatan->id)->count();;

        return view('angkatan.info', compact('angkatan', 'users', 'count'));
        // dd($angkatan, $users );
    }

    public function add()
    {
        return view('angkatan.add');
    }

    public function addprocess(Request $request)
    {
        $request->validate([
            'nomor_angkatan' => ['required', 'integer'],
            'nama_angkatan'  => ['required', 'string'],
            'tahun_lahir'    => ['required'],
        ]);

        $post = new Angkatan;
        $post->id = $request->nomor_angkatan;
        $post->nomor_angkatan = $request->nomor_angkatan;
        $post->nama_angkatan = $request->nama_angkatan;
        $post->tahun_lahir = $request->tahun_lahir;

        // Input Gambar
        if($request->file('gambar')){
            $gambar = $request->file('gambar');
            $name = $gambar->getClientOriginalName();
            $gambar->move('images/post/angkatan', $name);
            $post->gambar = $name;
        }
        $post->save();

        return redirect('angkatan')->with('status', 'Angkatan Bertambah!');

    }

    public function edit($id)
    {
        $angkatan = Angkatan::where('id', $id)->first();

        return view('angkatan.edit', compact('angkatan'));
    }

    public function editprocess(Request $request, $id)
    {
        //Get
        $post = Angkatan::findorfail($id);
        $post2 = Angkatan::get();

        //Input
        $post->id = $request->nomor_angkatan;
        $post->nomor_angkatan = $request->nomor_angkatan;
        $post->nama_angkatan = $request->nama_angkatan;
        $post->tahun_lahir = $request->tahun_lahir;

        // Input Gambar
        if($request->file('gambar')){
            $gambar = $request->file('gambar');
            $name = $gambar->getClientOriginalName();
            $gambar->move('images/post/angkatan', $name);
            $post->gambar = $name;
        }
        $post->update();


        return redirect('angkatan')->with('status', 'Angkatan Diubah!');
    }

    public function destroy($id)
    {
        // DB::table('pakets')->where('id', $id)->delete();
        Angkatan::where('id', $id)->delete();
        return redirect('angkatan')->with('status', "Angkatan Dihapus!");
    }

    public function upload()
    {
        $angkatans = Angkatan::all();
        $user = User::where('id', Auth::user()->id)->first();

        if (!empty($user->id_angkatans)) {
            return redirect('home');
        }
        return view('auth.angkatan', compact('user', 'angkatans'));

    }

    public function uploadprocess(Request $request, $id)
    {
        $angkatan = Angkatan::where('id', $id)->first();
        $post = User::where('id', Auth::user()->id)->first();
        $post->id_angkatans = $angkatan->id;
        $post->update();

        return redirect('upload/avatar');
    }
}
