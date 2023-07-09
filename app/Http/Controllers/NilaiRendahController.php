<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiRendah;
use App\Models\Penilaian;
use Hash;

class NilaiRendahController extends Controller
{
    //
    public function index(){
        $data   = NilaiRendah::join('elemen','elemen.id','nilai_rendah.id_elemen')->join('indikator','indikator.id','nilai_rendah.id_indikator')->select('nilai_rendah.*','elemen.elemen','indikator.indikator')->get()->all();
        return view('nilai_rendah.index', compact('data'));
    }

    public function nilai_rendah($id){
        $data   = NilaiRendah::join('elemen','elemen.id','nilai_rendah.id_elemen')->join('indikator','indikator.id','nilai_rendah.id_indikator')->select('nilai_rendah.*','elemen.elemen','indikator.indikator')->where('nilai_rendah.id_penilaian', $id)->get()->all();
        $id_penilaian = $id;
        return view('nilai_rendah.nilai_rendah', compact('data','id_penilaian'));
    }

    public function asignTo($id)
    {   
        $cekProdi = Penilaian::where('id', $id)->first();
        
        $us = NilaiRendah::where('id_penilaian', $id)->first();
        $us->asign_to = $cekProdi->user_id;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('nilai-rendah')->with('success', 'Kirim Nilai Rendah ke Prodi berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Kirim Nilai Rendah ke Prodi gagal!');
        }
        
    }

    public function create()
    {
        return view('nilai_rendah.create');
    }

    public function store(Request $request)
    {
        
        $us = new NilaiRendah;
        $us->indikator = $request->indikator;
        $us->skor = $request->skor;
        $us->catatan = $request->catatan;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('nilai-rendah')->with('success', 'Tambah Nilai Rendah berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Nilai Rendah gagal!');
        }
        
    }

    public function show($id)
    {
        $data = NilaiRendah::where('id', $id)->first();
        return view('nilai_rendah.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $us = NilaiRendah::where('id', $id)->first();
        $us->indikator = $request->indikator;
        $us->skor = $request->skor;
        $us->catatan = $request->catatan;
        $us->save();
        
        if ($us->save()) {
            return redirect('nilai-rendah')->with('success', 'Edit Nilai Rendah berhasil.!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Nilai Rendah gagal.!');
        }
         
    }

    public function destroy($id)
    {
        $data = NilaiRendah::where('id', $id)->delete();
        return redirect('nilai-rendah')->with('success', 'Hapus Nilai Rendah berhasil.!');
    }
}
