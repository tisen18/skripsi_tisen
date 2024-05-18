<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::get();
        return view ('DataUser.user', compact('user'));
    }

    public function create()
    {
        return view ('DataUser.input-user');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('/user');
    }

    public function edit($id)
    {
        $user = User::findorfail($id);
        return view ('DataUser.edit-user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
                

        $user->save();
        return redirect('/user');
    }

    public function destroy($id)
    {
        //cari id user
        $user = User::find($id);
      
        // hapus data
        $user->delete();
        return back();  
    }
}

