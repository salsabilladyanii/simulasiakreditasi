<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penugasan;
use App\Models\Penilaian;
use App\Models\Elemen;
use App\Models\Indikator;
use App\Models\Indikator_penilaian;
use Hash;

class ElemenController extends Controller
{
    //
    public function index($id){
        $data   = Elemen::where('id_lembaga', $id)->get()->all();
        $id_lembaga = $id;
        return view('elemen.index', compact('data','id_lembaga'));
    }

    public function store(Request $request)
    {
        $us = new Elemen;
        $us->id_lembaga = $request->id_lembaga;
        $us->elemen = $request->elemen;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('add-indikator-penilaian/'.$request->id_lembaga)->with('success', 'Tambah Elemen berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Elemen gagal!');
        }
        
    }

    public function update(Request $request, $id)
    {
        $us = Elemen::where('id',$id)->first();
        $us->id_lembaga = $request->id_lembaga;
        $us->elemen = $request->elemen;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('add-indikator-penilaian/'.$request->id_lembaga)->with('success', 'Edit Elemen berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Edit Elemen gagal!');
        }
        
    }

    public function hapus($id, $id_lembaga)
    {
        $data = Elemen::where('id', $id)->delete();
        return redirect('add-indikator-penilaian/'.$id_lembaga)->with('success', 'Hapus Indikator Penilaian berhasil.!');
    }

    public function indikator($id){
        $data   = Indikator::join('elemen', 'indikator.id_elemen','elemen.id')->select('indikator.*','elemen.elemen')->where('elemen.id', $id)->get()->all();
        $id_elemen = $id;
        return view('elemen.indikator', compact('data','id_elemen'));
    }

    public function storeIndikatorPenilaian(Request $request)
    {
        $us = new Indikator;
        $us->id_elemen = $request->id_elemen;
        $us->indikator = $request->indikator;
        $us->bobot = $request->bobot;
        $us->skor_min = $request->skor_min;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('do-add-indikator/'.$request->id_elemen)->with('success', 'Tambah Indikator Penilaian berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Indikator Penilaian gagal!');
        }
        
    }

    public function UpdateIndikatorPenilaian(Request $request, $id)
    {
        $us = Indikator::where('id', $id)->first();
        $us->id_elemen = $request->id_elemen;
        $us->indikator = $request->indikator;
        $us->bobot = $request->bobot;
        $us->skor_min = $request->skor_min;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('do-add-indikator/'.$request->id_elemen)->with('success', 'Tambah Indikator Penilaian berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Indikator Penilaian gagal!');
        }
        
    }

    public function destroy($id, $id_elemen)
    {
        $data = Indikator::where('id', $id)->delete();
        return redirect('do-add-indikator/'.$id_elemen)->with('success', 'Hapus Indikator Penilaian berhasil.!');
    }



    public function penilaianindikator($id){
        $data   = Indikator_penilaian::join('indikator', 'indikator_penilaian.id_indikator','indikator.id')->select('indikator_penilaian.*','indikator.indikator')->where('indikator.id', $id)->get()->all();
        $id_indikator = $id;
        return view('elemen.penilaian_indikator', compact('data','id_indikator'));
    }

    public function penilaianstoreIndikatorPenilaian(Request $request)
    {
        $us = new Indikator_penilaian;
        $us->id_indikator = $request->id_indikator;
        $us->indikator_penilaian = $request->indikator_penilaian;
        $us->skor = $request->skor;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('penilaian-indikator-add/'.$request->id_indikator)->with('success', 'Tambah Indikator Penilaian berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Indikator Penilaian gagal!');
        }
        
    }

    public function penilaianUpdateIndikatorPenilaian(Request $request, $id)
    {
        $us = Indikator_penilaian::where('id', $id)->first();
        $us->id_indikator = $request->id_indikator;
        $us->indikator_penilaian = $request->indikator_penilaian;
        $us->skor = $request->skor;
        $us->save();
       
        
        if ($us->save()) {
            return redirect('penilaian-indikator-add/'.$request->id_indikator)->with('success', 'Tambah Indikator Penilaian berhasil!');
        }
        else {
            return redirect()->back()->with('error', 'Tambah Indikator Penilaian gagal!');
        }
        
    }

    public function penilaiandestroy($id, $id_indikator)
    {
        $data = Indikator_penilaian::where('id', $id)->delete();
        return redirect('penilaian-indikator-add/'.$id_indikator)->with('success', 'Hapus Indikator Penilaian berhasil.!');
    }

}
