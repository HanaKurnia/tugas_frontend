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
}
