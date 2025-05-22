<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Prodi</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Program Studi</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/dataProdi/'.$dataProdi->kode_prodi) }}" method="POST" class="card p-4 shadow-sm">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode_prodi" class="form-label">Kode Prodi</label>
                    <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ old('kode_prodi', $dataProdi->kode_prodi) }}" readonly>
                    <small class="form-text text-muted">Kode Prodi tidak bisa diubah.</small>
                </div>

                <div class="mb-3">
                    <label for="nama_prodi" class="form-label">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ old('nama_prodi', $dataProdi->nama_prodi) }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm w-auto">Simpan</button>
                    <a href="{{ route('prodi.index') }}" class="btn btn-secondary btn-sm w-auto">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
