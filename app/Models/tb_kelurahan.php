<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kelurahan extends Model
{
    use HasFactory;
    protected $table = 'tb_kelurahan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [ // nama kolom yang di olah
        'nama_kelurahan',
        'id_kecamatan'
    ];
}
