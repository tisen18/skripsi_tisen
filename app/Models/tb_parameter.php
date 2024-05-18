<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_parameter extends Model
{
    use HasFactory;
    protected $table = 'tb_parameter';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id','nama_parameter'];
    public $timestamps = false;
}
