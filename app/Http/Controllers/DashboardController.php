<?php

namespace App\Http\Controllers;

use App\Models\tb_bencana;
use App\Models\tb_kategori;
use App\Models\tb_parameter;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = count(User::all());
        $bencanaCount = count(tb_bencana::all());
        $kategoriCount = count(tb_kategori::all());
        $parameterCount = count(tb_parameter::all());
        $nilaiCount = count(tb_bencana::join('tb_kelurahan', 'tb_bencana.id_kelurahan', '=', 'tb_kelurahan.id')
            ->join('tb_kategori', 'tb_bencana.id_kategori', '=', 'tb_kategori.id')
            ->get([
                'tb_bencana.*', 'tb_kelurahan.nama_kelurahan',
                'tb_kategori.nama_kategori'
            ]));
        return view('dashboard', compact(
            'userCount',
            'bencanaCount',
            'kategoriCount',
            'nilaiCount',
            'parameterCount'
        ));
    }
}
