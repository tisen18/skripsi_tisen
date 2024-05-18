<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kecamatan extends Model
{
    use HasFactory;

    protected $table = 'tb_kecamatan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id', 'nama_kecamatan'];
    public $timestamps = false;
}
