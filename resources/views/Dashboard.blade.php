@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="tab-content" id="dashboardTabsContent">
        <div class="tab-pane fade show active" id="prodi" role="tabpanel">
            <!-- Tabel Prodi -->
            <a href="{{ route('prodi.create') }}" class="btn btn-primary my-3">Tambah Prodi</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Prodi</th>
                        <th>Nama Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataProdi as $prodi)
                        <tr>
                            <td>{{ $prodi->kode_prodi }}</td>
                            <td>{{ $prodi->nama_prodi }}</td>
                            <td>
                                <a href="{{ route('prodi.edit', $prodi->kode_prodi) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('prodi.destroy', $prodi->kode_prodi) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($dataProdi->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">Data program studi belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="kelas" role="tabpanel">
            <!-- Tabel Kelas -->
            <a href="{{ route('kelas.create') }}" class="btn btn-primary my-3">Tambah Kelas</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataKelas as $kelas)
                        <tr>
                            <td>{{ $kelas->id_kelas }}</td>
                            <td>{{ $kelas->nama_kelas }}</td>
                            <td>
                                <a href="{{ route('kelas.edit', $kelas->id_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kelas.destroy', $kelas->id_kelas) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($dataKelas->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">Data kelas belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
