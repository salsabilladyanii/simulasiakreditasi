<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\User;
use App\Models\Indikator;
use App\Models\Indikator_penilaian;
use App\Models\Lembaga;
use App\Models\Elemen;
use App\Models\Penilaian_akreditasi;
use App\Models\NilaiRendah;
use App\Models\Dokumen_indikator;
use Hash;

class PenilaianController extends Controller
{
    //
    public function index(){
        $data   = Penilaian::leftJoin('penugasan','penugasan.id_penilaian','penilaian.id')->leftJoin('users','users.id','penugasan.id_reviewer')->select('penilaian.*','users.nama')->where('user_id', session('auth_user')['id'])->get()->all();
        return view('penilaian.index', compact('data'));
    }

    public function create()
    {   
        $detailData = User::where('id', session('auth_user')['id'])->first();

        return view('penilaian.create', compact('detailData'));
    }

    public function store(Request $request)
    {
        $us = new Penilaian;
        $us->nama_pt = $request->nama_pt;
        $us->unit_pengelola = $request->unit_pengelola;
        $us->nama_prodi = $request->nama_prodi;
        $us->lembaga_akreditasi = $request->lembaga_akreditasi;
        $us->ts = $request->ts;
        
        $us->kegiatan = $request->kegiatan;
        $us->user_id = session('auth_user')['id'];

        if(!empty($request->hasfile('dokumen'))){
            $extension       = $request->file('dokumen')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('assets/dokumen');
            $request->file('dokumen')->move($path, $fileNameToStore);

            $us->dokumen = $fileNameToStore;
        }

        $us->save();
       
        
        if ($us->save()) {
            return redirect('penilaian')->with('success', 'Tambah Penilaian berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Penilaian gagal!');
        }
        
    }

    public function show($id)
    {
        $data = Penilaian::where('id', $id)->first();
        return view('penilaian.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $us = Penilaian::where('id', $id)->first();
        
        $us->nama_pt = $request->nama_pt;
        $us->unit_pengelola = $request->unit_pengelola;
        $us->lembaga_akreditasi = $request->lembaga_akreditasi;
        $us->nama_prodi = $request->nama_prodi;
        $us->ts = $request->ts;
        $us->dokumen = $request->dokumen;
        $us->kegiatan = $request->kegiatan;

        if(!empty($request->hasfile('dokumen'))){
            $extension       = $request->file('dokumen')->getClientOriginalExtension();
            $fileNameToStore = time().".".$extension;
            $path            = public_path('assets/dokumen');
            $request->file('video')->move($path, $fileNameToStore);

            $us->dokumen = $fileNameToStore;
        }

        $us->save();
        
        if ($us->save()) {
            return redirect('penilaian')->with('success', 'Edit Penilaian berhasil.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Penilaian gagal.!');
        }
         
    }

    public function destroy($id)
    {
        $data = Penilaian::where('id', $id)->delete();
        return redirect('penilaian')->with('success', 'Hapus Penilaian berhasil.!');
    }

    public function dokumen($id, $id_penilaian)
    {   
        $data = Indikator::join('elemen','elemen.id','indikator.id_elemen')->select('indikator.*')->where('id_lembaga', $id)->get();
        $id_lembaga = $id;
        $penilaian_id = $id_penilaian;

        return view('penilaian.dokumen',compact('data','id_lembaga','id_penilaian'));
    }

    public function uploadDokumen(Request $request)
    {   
        $data = Dokumen_indikator::where('penilaian_id', $request->id_penilaian)->delete();

        $us = new Dokumen_indikator;
        $files = request()->file('lampiran');
        $lampiran = [];
        if(!empty($files)){
            foreach ($files as $key => $file) {    
                if(!empty($file)){
                    
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore= time().'.'.$extension;
                    
                    $path = public_path('assets/dokumen/lampiran/');
                    $file->move($path, $fileNameToStore);
                    
                    $lampiran[] = "assets/dokumen/lampiran/".$fileNameToStore;
                    
                }
            }
        }
        if($request->hasFile('dokumen')){
            
            $extension = $request->file('dokumen')->getClientOriginalExtension();
            $fileNameToStore= time().'.'.$extension;
            
            $path = public_path('assets/dokumen/dokumen/');
            $request->file('dokumen')->move($path, $fileNameToStore);
            
            $us->dokumen = "assets/dokumen/dokumen/".$fileNameToStore;
        }

        if($request->hasFile('led')){
            
            $extension = $request->file('led')->getClientOriginalExtension();
            $fileNameToStore= time().'.'.$extension;
            
            $path = public_path('assets/dokumen/led/');
            $request->file('led')->move($path, $fileNameToStore);
            
            $us->led = "assets/dokumen/led/".$fileNameToStore;
        }

        if($request->hasFile('lkps')){
            
            $extension = $request->file('lkps')->getClientOriginalExtension();
            $fileNameToStore= time().'.'.$extension;
            
            $path = public_path('assets/dokumen/lkps/');
            $request->file('lkps')->move($path, $fileNameToStore);
            
            $us->lkps = "assets/dokumen/lkps/".$fileNameToStore;
        }

        if($request->hasFile('lkps_isian')){
            
            $extension = $request->file('lkps_isian')->getClientOriginalExtension();
            $fileNameToStore= time().'.'.$extension;
            
            $path = public_path('assets/dokumen/lkps/');
            $request->file('lkps_isian')->move($path, $fileNameToStore);
            
            $us->lkps_isian = "assets/dokumen/lkps/".$fileNameToStore;
        }

        $us->penilaian_id = $request->id_penilaian;
        $us->lampiran     = json_encode($lampiran);
        $us->save();
        return redirect('penilaian')->with('success', 'Upload Dokumen berhasil.!');
    }
}
