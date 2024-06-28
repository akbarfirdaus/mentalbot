<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use mongoDB\laravel\Eloquent\Model as Eloquent;

class gejalaLainnya extends Eloquent
{
    use HasFactory;

    protected $collection = 'gejalalainnya';
    protected $fillable = ['kode_gejala', 'nama_gejala', 'keterangan'];
}
