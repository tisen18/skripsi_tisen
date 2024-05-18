<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_bencana extends Model
{
    use HasFactory;
    protected $table = 'tb_bencana'; // mendefinisikan nama tabel
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'id_kelurahan',
        'tahun',
        'id_kategori',
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'nilai_4'
    ];
}
