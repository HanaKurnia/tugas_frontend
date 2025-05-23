
# 📘 Tutorial Laravel CRUD dengan AdminLTE

Aplikasi ini adalah contoh implementasi CRUD sederhana untuk data **Program Studi (Prodi) dan Kelas** menggunakan **Laravel 10** dan **AdminLTE**.

---

### 🐙 Cara Clone Repository GitHub (Backend)
### - Langkah 1: Clone Repo dari GitHub
- Buka terminal (CMD/Git Bash) lalu jalankan:

```bash
git clone https://github.com/kristiandimasadiwicaksono/SI-KRS-Backend.git
```

---

### - Langkah 2: Masuk ke Folder Project

```bash
cd SI-KRS-Backend
```

---

### - Langkah 3: Install Dependency Laravel

```bash
composer install
```

---

### ✅ Langkah 4: Copy dan Edit File .env

```bash
cp .env.example .env
```
- Lalu edit isi `.env`:

```env
database.default.hostname = localhost
database.default.database = db_krs
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```
- Jangan lupa ubah bagian environment
```env
CI_ENVIRONMENT = development
```

---

### - Langkah 5: Jalankan Migrasi Database
```bash
php spark migrate
```

---

### - Langkah 6: Jalankan Server 

```bash
php spark serve
```
- Server akan berjalan di browser:
```
http://localhost:8000
```

---

## 📌 API Endpoint
---

### 📚 **Endpoint Kelas**

* **GET** → `http://localhost:8080/kelas`
* **GET (by ID)** → `http://localhost:8080/kelas/{id_kelas}`
* **POST** → `http://localhost:8080/kelas`
* **PUT** → `http://localhost:8080/kelas/{id_kelas}`
* **DELETE** → `http://localhost:8080/kelas/{id_kelas}`

---

### 🎓 **Endpoint Prodi**

* **GET** → `http://localhost:8080/prodi`
* **GET (by Kode)** → `http://localhost:8080/prodi/{kode_prodi}`
* **POST** → `http://localhost:8080/prodi`
* **PUT** → `http://localhost:8080/prodi/{kode_prodi}`
* **DELETE** → `http://localhost:8080/prodi/{kode_prodi}`
---

## 🧱 Import Database
- Buka link repository
  ```bash
  https://github.com/WindyAnggitaPutri/SI_KRS_Database.git
  ```
- Download file db_krs kemudian import
---

## 🚀 Tutorial Install Laravel di Laragon (Windows)

### - Langkah 1: Install Laragon

1. Pastikan Laragon sudah terinstall, jika belum download Laragon di:
   👉 [https://laragon.org/download/](https://laragon.org/download/)
2. Setelah selesai, buka Laragon dan klik:

   ```
   Start All
   ```
---

### - Langkah 2: Buat Project Laravel

### 🔹 Cara 1: Otomatis (GUI Laragon)

1. Klik kanan pada tray icon Laragon → pilih **Quick app → Laravel**
2. Beri nama project, misal: `frontend`

> 🎉 Laragon otomatis akan menjalankan `composer create-project laravel/laravel` dan membuat folder `frontend`.

---
3. Setelah selesai, jalankan:

   ```bash
   cd frontend
   php artisan serve
   ```
- Akses di browser:

   ```
   http://localhost:8000
   ```
---

### - Langkah 3: Jalankan Laravel

```bash
cd C:\laragon\www\frontend
php artisan serve
```

---

## 🧠 Bonus: Perintah Penting Laravel

| Perintah                      | Fungsi                           |
| ----------------------------- | -------------------------------- |
| `php artisan serve`           | Menjalankan server lokal Laravel |
| `php artisan migrate`         | Menjalankan migrasi database     |
| `php artisan make:model Nama` | Membuat model                    |
| `php artisan make:controller` | Membuat controller               |

---

### 4. Setup Database `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_krs
DB_USERNAME=root
DB_PASSWORD=
```
---

## 🎨 Install AdminLTE di Laravel

AdminLTE adalah template dashboard Bootstrap yang bisa langsung dipakai di Laravel menggunakan package `jeroennoten/laravel-adminlte`.

### Langkah 1: Install Package
- Buka terminal (CMD/Git Bash)
```bash
composer require jeroennoten/laravel-adminlte
```

### Langkah 2: Jalankan Instalasi AdminLTE

```bash
php artisan adminlte:install
```
- Ini akan:

* Memasang konfigurasi AdminLTE (`config/adminlte.php`)
* Menyediakan layout default
* Menghubungkan dengan tampilan `auth` jika kamu menggunakan Laravel UI

### Langkah 3: Buat Autentikasi

```bash
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev
```

## 🔧 Konfigurasi Tambahan 

- Ini untuk mengubah tampilan atau menu sidebar:
- Buka file konfigurasi:

```php
config/adminlte.php
```

### - `config/adminlte.php
- Tambahkan menu sidebar

```php
<?php

return [

   'menu' => [
    // Sidebar search
    [
        'type' => 'sidebar-menu-search',
        'text' => 'search',
    ],

    // Sidebar items
    [
        'text' => 'Prodi',
        'url'  => 'prodi',
        'icon' => 'fas fa-fw fa-university',
    ],
    [
        'text' => 'Kelas',
        'url'  => 'kelas',
        'icon' => 'fas fa-fw fa-chalkboard',
    ],
],

];

```
---
### 5. Buat Tabel dan Migrasi

```bash
php artisan make:model DataProdi -m
```
- Buat model untuk prodi
- Untuk kelas tidak menggunakan model

### - `models/DataProdi.php`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProdi extends Model
{
     protected $table = 'prodi';
    protected $primaryKey = 'kode_prodi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kode_prodi', 'nama_prodi'];

    public $timestamps = false;

    public function getRouteKeyName()
{
    return 'kode_prodi';
}

}

```

Lalu jalankan migrasi:

```bash
php artisan migrate
```
## 🔁 Routing

### - `routes/web.php`:

```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataProdiController;
use App\Http\Controllers\KelasController;

Route::resource('prodi', DataProdiController::class);



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::resource('prodi', DataProdiController::class);
Route::get('/dataProdi/{kode_prodi}', [DataProdiController::class, 'show'])->name('prodi.show');
Route::put('/dataProdi/{kode_prodi}', [DataProdiController::class, 'update'])->name('prodi.update');

Route::resource('kelas', KelasController::class);

```
---

## 🧠 CRUD Controller

- Buat controller:

```bash
php artisan make:controller DashboardController --resource
```

### - isi `DashboardController.php`:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
public function index()
{
    $dataProdi = DB::table('prodi')->get(); 
    $dataKelas = DB::table('kelas')->get();    

    return view('dashboard', compact('dataProdi', 'dataKelas'));
}
}
```
### - `DataProdiController.php`:
```php
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
```
### - `KelasController.php`:
```php
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
```
---

## 🖼️ Views (Blade)
- Buat view:

```bash
php artisan make:view dashboard 
```
### - `resources/views/dashboard.blade.php`

```blade
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
```

### - `prodi.blade.php`
```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Program Studi</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Daftar Program Studi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ url('/prodi/create') }}" class="btn btn-primary">Tambah Prodi</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
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
                            <a href="{{ url('/prodi/'.$prodi->kode_prodi.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ url('/prodi/'.$prodi->kode_prodi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
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
</div>

<!-- Bootstrap JS (opsional, untuk interaktivitas) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
### - `create.blade.php`
```blade
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
```
### - `edit.blade.php`
```blade
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
```
### - Buat folder: `resources/views/kelas/`
- Buat file 
```bash
php artisan make:view index 
```

### - `index.php`
```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kelas</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Daftar Kelas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ url('/kelas/create') }}" class="btn btn-primary">Tambah Kelas</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
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
                            <a href="{{ url('/kelas/'.$kelas->id_kelas.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ url('/kelas/'.$kelas->id_kelas) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
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

<!-- Bootstrap JS (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
### - `kelas.php`
```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kelas</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Daftar Kelas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ url('/kelas/tambahKelas') }}" class="btn btn-primary">Tambah Prodi</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
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
                            <a href="{{ url('/prodi/'.$prodi->kode_prodi.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ url('/prodi/'.$prodi->kode_prodi) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
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
</div>

<!-- Bootstrap JS (opsional, untuk interaktivitas) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
### - `create.php`
```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Tambah Kelas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/kelas') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_kelas" class="form-label">ID Kelas</label>
            <input type="text" id="id_kelas" name="id_kelas" class="form-control" value="{{ old('id_kelas') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" value="{{ old('nama_kelas') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
### - `edit.php`
```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Edit Kelas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/kelas/' . $kelas->id_kelas) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_kelas" class="form-label">ID Kelas</label>
            <input type="text" id="id_kelas" name="id_kelas" class="form-control" value="{{ $kelas->id_kelas }}" readonly>
        </div>

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
---

## ✅ Jalankan Aplikasi

```bash
php artisan serve
```

Buka di browser:
[http://localhost:8000/prodi](http://localhost:8000/prodi)

---

## 📁 Struktur Folder

```
app/
├── Http/
│   └── Controllers/
│       └── ProdiController.php
resources/
├── views/
│   └── prodi/
│       ├── index.blade.php
│       ├── create.blade.php
│       └── edit.blade.php
routes/
├── web.php
```

---

## ✨ Catatan

* Pastikan database berjalan
* Laravel versi 10 atau di atasnya disarankan
* AdminLTE v3 secara default dari paket `jeroennoten/laravel-adminlte`

---

 
