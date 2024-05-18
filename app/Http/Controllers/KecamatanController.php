<?php

namespace App\Http\Controllers;

use App\Models\tb_kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KecamatanController extends Controller
{
    public function index()
    {
        $camat = tb_kecamatan::get();
        return view ('DataKecamatan.kecamatan', compact('camat'));
    }

    // public function cetakProduk()
    // {
    //     $dtProduk = tb_kecamatan::get();
    //     return view ('DataKecamatan.cetak-produk', compact('dtProduk'));
    // }

    public function create()
    {
        return view ('DataKecamatan.input-camat');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kecamatan' => 'required',
        ]);

        tb_kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);
        return redirect('/camat');
    }

    public function edit($id)
    {
        $camat = tb_kecamatan::findorfail($id);
        return view ('DataKecamatan.edit-camat', compact('camat'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kecamatan' => 'required',
        ]);

        $camat = tb_kecamatan::find($id);
        $camat->nama_kecamatan = $request->nama_kecamatan;        

        $camat->save();
        return redirect('/camat');
    }

    public function destroy($id)
    {
        // hapus file
        $camat = tb_kecamatan::find($id);
      
        // hapus data
        $camat->delete();
        return back();  
    }
}



