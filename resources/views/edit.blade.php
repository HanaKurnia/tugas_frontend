<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Prodi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar dan Sidebar sama seperti dashboard -->

    <div class="content-wrapper">
        <section class="content-header pt-3 pb-2">
            <div class="container-fluid">
                <h1>Edit Program Studi</h1>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <a href="{{ route('prodi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/dataProdi/'.$dataProdi->kode_prodi) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kode_prodi">Kode Prodi</label>
                        <input type="text" name="kode_prodi" class="form-control" id="kode_prodi" value="{{ old('kode_prodi', $dataProdi->kode_prodi) }}" readonly>
                        <small class="form-text text-muted">Kode Prodi tidak bisa diubah.</small>
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Nama Prodi</label>
                        <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" value="{{ old('nama_prodi', $dataProdi->nama_prodi) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </section>
    </div>

    <footer class="main-footer text-center">
        <strong>Hak Cipta &copy; {{ date('Y') }}.</strong>
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
