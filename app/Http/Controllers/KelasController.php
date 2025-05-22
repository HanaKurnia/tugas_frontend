<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $dataKelas = DB::table('kelas')->get();
        return view('kelas.index', compact('dataKelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|unique:kelas,id_kelas|max:10',
            'nama_kelas' => 'required|max:100',
        ]);

        DB::table('kelas')->insert([
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit($id_kelas)
    {
        $kelas = DB::table('kelas')->where('id_kelas', $id_kelas)->first();
        if (!$kelas) {
            abort(404);
        }

        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id_kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|max:100',
        ]);

        DB::table('kelas')->where('id_kelas', $id_kelas)->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diupdate.');
    }

    public function destroy($id_kelas)
    {
        DB::table('kelas')->where('id_kelas', $id_kelas)->delete();
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
