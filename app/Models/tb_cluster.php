<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_cluster extends Model
{
    use HasFactory;
    protected $table = 'datacluster';
    protected $fillable = [ // nama kolom yang di olah
        'wilayah',
        'parameter',
        'kriteria',
        'tahun'
    ];
}
