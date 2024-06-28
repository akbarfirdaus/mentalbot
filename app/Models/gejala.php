<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use mongoDB\laravel\Eloquent\Model as Eloquent;

class gejala extends Eloquent
{
    use HasFactory;

    protected $fillable = ['kode_gejala', 'nama_gejala', 'keterangan'];
}
