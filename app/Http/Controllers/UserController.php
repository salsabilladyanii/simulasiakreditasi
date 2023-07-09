<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    //
    public function index(){
    	$data 	= User::get()->all();
    	return view('user.index', compact('data'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $pass = $request->password;
        $confpass = $request->confirm_password;

        
            $us = new User;
            $us->nama = $request->nama;
            $us->username = $request->username;
            $us->password = Hash::make($request->password);
            $us->role = $request->role;
            $us->email = $request->email;
            $us->save();
       
        
        if ($us->save()) {
            return redirect('user')->with('success', 'Tambah Pengguna berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Pengguna gagal!');
        }
        
    }

    public function show($id_user)
    {
        $data = User::where('id', $id_user)->first();
        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id_user)
    {

        $hash = $request->hashpass;
        $pass = $request->password;
        $confpass = $request->confirm_password;

        if ($pass == '') {
            $us = User::where('id', $id_user)->first();
            $us->nama = $request->nama;
            $us->username = $request->username;
            $us->role = $request->role;
            $us->email = $request->email;
            $us->save();
        }else{
            $us = User::where('id', $id_user)->first();
            $us->nama = $request->nama;
            $us->username = $request->username;
            $us->password = Hash::make($request->password);
            $us->role = $request->role;
            $us->email = $request->email;
            $us->save();
        }
        
        if ($us->save()) {
            return redirect('user')->with('success', 'Edit Pengguna berhasil.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Pengguna gagal.!');
        }
         
    }

    public function destroy($id_user)
    {
        $data = User::where('id', $id_user)->delete();
        return redirect('user')->with('success', 'Hapus Pengguna berhasil.!');
    }
}
