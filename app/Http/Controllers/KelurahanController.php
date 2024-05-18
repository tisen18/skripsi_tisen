<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tb_kelurahan;
use App\Models\tb_kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $lurah = tb_kelurahan::join('tb_kecamatan', 'tb_kelurahan.id_kecamatan', '=', 'tb_Kecamatan.id')
        ->get(['tb_kelurahan.*', 'tb_kecamatan.nama_kecamatan']);
        return view ('DataKelurahan.kelurahan', ['lurah' => $lurah]);
    }

    public function create()
    {
        $camat = tb_kecamatan::get();
        return view ('DataKelurahan.input-lurah', ['camat' => $camat]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kecamatan' => 'required',
            'nama_kelurahan' => 'required',
        ]);

        tb_kelurahan::create([
            'id_kecamatan' => $request->id_kecamatan,
            'nama_kelurahan' => $request->nama_kelurahan,

        ]);
        return redirect('/lurah');
    }

    public function edit($id)
    {
        $lurah = tb_kelurahan::findorfail($id);
        $camat = tb_kecamatan::get();
        return view ('DataKelurahan.edit-lurah', ['camat' => $camat], ['lurah'=> $lurah]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_kecamatan' => 'required',
            'nama_kelurahan' => 'required',
        ]);

        $lurah = tb_kelurahan::find($id);
        $lurah->id_kecamatan = $request->id_kecamatan;
        $lurah->nama_kelurahan = $request->nama_kelurahan;        

        $lurah->save();
        return redirect('/lurah');
    }

    public function destroy($id)
    {
        // hapus file
        $lurah = tb_kelurahan::find($id);
      
        // hapus data
        $lurah->delete();
        return back();  
    }
}
