<?php

namespace App\Http\Controllers;

use App\Models\tb_kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = tb_kategori::get();
        return view ('DataKategori.kategori', compact('kategori'));
    }
    public function create()
    {
        return view ('DataKategori.input-kategori');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        tb_kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('kategori');
    }

    public function edit($id)
    {
        $kategori = tb_kategori::findorfail($id);
        return view ('Datakategori.edit-kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        $kategori = tb_kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;        

        $kategori->save();
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        // hapus file
        $kategori = tb_kategori::find($id);
      
        // hapus data
        $kategori->delete();
        return back();  
    }
}
