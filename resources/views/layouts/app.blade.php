<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Prodi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
</head>
<body>
<div class="container mt-4">
    <h2>Detail Program Studi</h2>
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
</div>
</body>
</html>
