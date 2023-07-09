<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function coba()
    {
        return view('auth.coba');
    }

    public function doLogin(Request $request)
    {
        $checkUser = User::where('username', $request->username)
            ->get()->first();
        // dd($checkKaryawan);
        
        if (!empty($checkUser)) {
            if (Hash::check($request->password, $checkUser->password)) {
                $request->session()->put('auth_user', $checkUser->toArray());
                return redirect('/');
            }
            else{
                return redirect()->back()->with('error', 'Password yang anda masukan salah.!');
                die('Password yang anda masukan salah.!');
            }
        }else {
            return redirect()->back()->with('error', 'Username Tidak Terdaftar.!');
            die("Username Tidak Terdaftar");
        }
        debugCode($checkUser);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {

        $sk = new User;
        $sk->nama = $request->nama;
        $sk->email = $request->email;
        $sk->username = $request->username;
        $sk->username = $request->username;
        $sk->nrk = $request->nrk;
        $sk->password = Hash::make($request->password);
        $sk->role = $request->role;
        $sk->save();

        if ($sk->save()) {
            return redirect('login')->with('success', 'Register berhasil!');
        }
        else {
            return redirect()->back()->with('erros', 'Register gagal!');
        }

    }
}
