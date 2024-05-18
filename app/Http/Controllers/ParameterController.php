<?php

namespace App\Http\Controllers;

use App\Models\tb_parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ParameterController extends Controller
{
    public function index()
    {
        $parameter = tb_parameter::get();
        return view ('DataParameter.parameter', compact('parameter'));
    }

    // public function cetakProduk()
    // {
    //     $dtProduk = tb_parameter::get();
    //     return view ('DataKecamatan.cetak-produk', compact('dtProduk'));
    // }

    public function create()
    {
        return view ('DataParameter.input-parameter');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_parameter' => 'required',
        ]);

        tb_parameter::create([
            'nama_parameter' => $request->nama_parameter,
        ]);
        return redirect('/parameter');
    }

    public function edit($id)
    {
        $parameter = tb_parameter::findorfail($id);
        return view ('DataParameter.edit-parameter', compact('parameter'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_parameter' => 'required',
        ]);

        $parameter = tb_parameter::find($id);
        $parameter->nama_parameter = $request->nama_parameter;        

        $parameter->save();
        return redirect('/parameter');
    }

    public function destroy($id)
    {
        //cari id parameter
        $paramater = tb_parameter::find($id);
      
        // hapus data
        $paramater->delete();
        return back();  
    }
}
