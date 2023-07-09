<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index');
    }

    public function informasi()
    {
        return view('home.informasi');
    }

    public function profile($id)
    {   
        $data = User::where('id', $id)->first();
        return view('home.profile', compact('data'));
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
            return redirect()->back()->with('success', 'Update Profile berhasil.!');
        }
        else {
            return redirect()->back()->with('error', 'Update Profile gagal.!');
        }
         
    }

}
