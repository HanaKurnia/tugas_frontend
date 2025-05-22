<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Prodi</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Tambah Program Studi</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prodi.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="kode_prodi" class="form-label">Kode Prodi</label>
            <input type="text" id="kode_prodi" name="kode_prodi" class="form-control" value="{{ old('kode_prodi') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_prodi" class="form-label">Nama Prodi</label>
            <input type="text" id="nama_prodi" name="nama_prodi" class="form-control" value="{{ old('nama_prodi') }}" required>
        </div>

        <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary btn-lg w-auto">Simpan</button>
    <a href="{{ route('prodi.index') }}" class="btn btn-secondary btn-lg w-auto">Kembali</a>
</div>

    </form>
</div>

<!-- Bootstrap JS (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
