<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_parameter;
use App\Models\tb_kategori;
use App\Models\tb_kecamatan;
use App\Models\tb_kelurahan;
use App\Models\tb_bencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    public function index()
    {
        $bencana = tb_bencana::join('tb_kelurahan', 'tb_bencana.id_kelurahan', '=', 'tb_kelurahan.id')
            ->join('tb_kecamatan', 'tb_kelurahan.id_kecamatan', '=', 'tb_kecamatan.id')
            ->join('tb_kategori', 'tb_bencana.id_kategori', '=', 'tb_kategori.id')
            ->orderBy('tahun', 'desc')
            ->get([
                'tb_bencana.*', 'tb_kelurahan.nama_kelurahan',
                'tb_kecamatan.nama_kecamatan', 'tb_kategori.nama_kategori'
            ]);
        return view('DataBencana.bencana', ['bencana' => $bencana]);
    }

    public function create()
    {
        $kategori = tb_kategori::all();
        $lurah = tb_kelurahan::all();
        $camat = tb_kecamatan::all();
        return view('DataBencana.input-bencana', [
            'kategori' => $kategori, 'camat' => $camat, 'lurah' => $lurah
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kelurahan' => 'required',
            'tahun' => 'required',
            'id_kategori' => 'required',
            'nilai_1' => 'required',
            'nilai_2' => 'required',
            'nilai_3' => 'required',
            'nilai_4' => 'required',
            'update'
        ]);

        tb_bencana::create([
            'id_kelurahan' => $request->id_kelurahan,
            'tahun' => $request->tahun,
            'id_kategori' => $request->id_kategori,
            'nilai_1' => $request->nilai_1,
            'nilai_2' => $request->nilai_2,
            'nilai_3' => $request->nilai_3,
            'nilai_4' => $request->nilai_4,

        ]);
        return redirect('/bencana');
    }

    public function edit($id)
    {
        $dataubah = tb_bencana::find($id);
        $parameter = tb_parameter::all();
        $kategori = tb_kategori::all();
        $lurah = tb_kelurahan::all();
        $camat = tb_kecamatan::all();
        return view('DataBencana.edit-bencana', [
            'dataubah' => $dataubah, 'parameter' => $parameter,
            'kategori' => $kategori, 'camat' => $camat,
            'lurah' => $lurah,
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_kelurahan' => 'required',
            'tahun' => 'required',
            'id_kategori' => 'required',
            'nilai_1' => 'required',
            'nilai_2' => 'required',
            'nilai_3' => 'required',
            'nilai_4' => 'required',
        ]);

        tb_bencana::find($id)->update([
            'id_desa' => $request->id_desa,
            'tahun' => $request->tahun,
            'id_kategori' => $request->id_kategori,
            'nilai_1' => $request->nilai_1,
            'nilai_2' => $request->nilai_2,
            'nilai_3' => $request->nilai_3,
            'nilai_4' => $request->nilai_4,
        ]);
        return redirect('/bencana');
    }

    public function destroy($id)
    {
        // hapus file
        $bencana = tb_bencana::find($id);
      
        // hapus data
        $bencana->delete();
        return back();  
    }
}
