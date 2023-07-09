<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Penugasan;
use App\Models\Penilaian;
use App\Models\User;
use Hash;
use URL;
use App\Mail\MailInfo;

class PenugasanController extends Controller
{
    //
    public function index(){
        $data   = Penilaian::leftJoin('penugasan','penugasan.id_penilaian','penilaian.id')->leftJoin('users','users.id','penugasan.id_reviewer')->select('penilaian.*','users.nama')->get()->all();
        return view('penugasan.index', compact('data'));
    }

    public function show($id)
    {
        $data = Penilaian::where('id', $id)->first();
        $dataReviewer = User::where('role','reviewer')->get();
        $dataPenugasan = Penugasan::where('id_penilaian', $id)->first();
        
        return view('penugasan.edit', compact('data','dataReviewer','dataPenugasan'));
    }

    public function update(Request $request)
    {   
        $cek = Penugasan::where('id_penilaian', $request->id_penilaian)->first();
        if(!empty($cek)){
            $us = Penugasan::where('id_penilaian', $request->id_penilaian)->first();
            $us->id_penilaian = $request->id_penilaian;
            $us->id_reviewer = $request->id_reviewer;
            $us->save();
        }else{
            $us = new Penugasan;
        
            $us->id_penilaian = $request->id_penilaian;
            $us->id_reviewer = $request->id_reviewer;
            $us->save();
        }
        $p = Penilaian::where('id', $request->id_penilaian)->first();
        $p->status = 1;
        $p->save();
        
        $CekEmail = User::where('id', $request->id_reviewer)->first();

        $url = URL::to('/akreditasi');
        $details = [
            'url' => $url
        ];
        // return view('email.undangan',$details);
        Mail::to($CekEmail->email)->send(new MailInfo($details));


        if ($us->save()) {
            return redirect('penugasan')->with('success', 'Edit Penugasan berhasil.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Penugasan gagal.!');
        }
         
    }
}
