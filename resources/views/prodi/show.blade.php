@extends('layouts.app') <!-- Ganti jika kamu pakai layout berbeda -->

@section('title', 'Detail Prodi')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Detail Program Studi</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Kode Prodi</th>
                    <td>{{ $dataProdi->kode_prodi }}</td>
                </tr>
                <tr>
                    <th>Nama Prodi</th>
                    <td>{{ $dataProdi->nama_prodi }}</td>
                </tr>
            </table>

            <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('prodi.edit', $dataProdi->kode_prodi) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('prodi.destroy', $dataProdi->kode_prodi) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
