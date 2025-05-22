<?php

namespace App\Http\Controllers;

use App\Models\DataProdi;
use Illuminate\Http\Request;

class DataProdiController extends Controller
{
    public function index()
    {
        $dataProdi = DataProdi::all();
        return view('prodi', compact('dataProdi'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|unique:prodi,kode_prodi|max:8',
            'nama_prodi' => 'required|max:100',
        ]);

        DataProdi::create($request->only('kode_prodi', 'nama_prodi'));

        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil ditambahkan.');
    }

    public function show($kode_prodi)
    {
        $dataProdi = DataProdi::where('kode_prodi', $kode_prodi)->firstOrFail();
        return view('prodi.show', compact('dataProdi'));
    }

    public function edit($kode_prodi)
    {
        $dataProdi = DataProdi::where('kode_prodi', $kode_prodi)->firstOrFail();
        return view('edit', compact('dataProdi'));
    }

    public function update(Request $request, $kode_prodi)
{
    $request->validate([
        'nama_prodi' => 'required|string|max:100',
    ]);

    $prodi = DataProdi::where('kode_prodi', $kode_prodi)->firstOrFail();
    $prodi->update([
        'nama_prodi' => $request->nama_prodi,
    ]);

    return redirect()->route('prodi.index')->with('success', 'Data berhasil diupdate');
}

    public function destroy($kode_prodi)
    {
        $dataProdi = DataProdi::where('kode_prodi', $kode_prodi)->firstOrFail();
        $dataProdi->delete();

        return redirect()->route('prodi.index')->with('success', 'Data prodi berhasil dihapus.');
    }
}
