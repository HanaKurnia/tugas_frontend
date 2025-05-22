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
