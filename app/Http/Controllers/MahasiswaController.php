<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Requests\MahasiswaRequest;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = Mahasiswa::get();
        return view('index', compact('mahasiswa'));
    }

    public function store(MahasiswaRequest $request)
    {
        $mahasiswa = new Mahasiswa();

        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->semester = $request->semester;

        $mahasiswa->save();

        return redirect('/');
    }

    public function update(MahasiswaRequest $request, $id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->semester = $request->semester;
        
        $mahasiswa->update();

        return redirect('/');
    }

    public function hapus($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        $mahasiswa->delete();

        return redirect('/');
    }
}
