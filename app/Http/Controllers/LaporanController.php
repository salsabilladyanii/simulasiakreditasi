<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penugasan;
use App\Models\Penilaian;
use App\Models\User;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function index()
    {
        $data   = Penilaian::leftJoin('penugasan', 'penilaian.id', 'penugasan.id_penilaian')->leftJoin('laporan', 'laporan.penilaian_id', 'penilaian.id')->select('laporan.*', 'penugasan.id_reviewer', 'penilaian.id as nilai_id', 'penilaian.nama_prodi', 'penilaian.lembaga_akreditasi')->get()->all();
        return view('laporan.index', compact('data'));
    }

    public function create($id)
    {
        $data   = Penilaian::leftJoin('penugasan', 'penilaian.id', 'penugasan.id_penilaian')->select('penilaian.*', 'penugasan.id_reviewer')->where('penilaian.id', $id)->first();
        $id_nilai = $id;
        return view('laporan.create', compact('data', 'id_nilai'));
    }

    public function store(Request $request)
    {

        $us = new Laporan;
        $us->lembaga_id = $request->lembaga_id;
        $us->jurusan = $request->jurusan;
        $us->prodi = $request->prodi;
        $us->jml_dosen = $request->jml_dosen;
        $us->jml_doktor_sekarang = $request->jml_doktor_sekarang;
        $us->jm_doktor_target = $request->jm_doktor_target;
        $us->jml_doktor_kekurangan = $request->jml_doktor_kekurangan;
        $us->jml_lektor_sekarang = $request->jml_lektor_sekarang;
        $us->jml_lektor_target = $request->jml_lektor_target;
        $us->jml_lektor_kekurangan = $request->jml_lektor_kekurangan;
        $us->target_akreditasi = $request->target_akreditasi;
        $us->thn_reakreditasi = $request->thn_reakreditasi;
        $us->tgl_akreditasi = $request->tgl_akreditasi;
        $us->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $us->penilaian_id = $request->penilaian_id;
        $us->save();


        if ($us->save()) {
            return redirect('laporan')->with('success', 'Tambah Laporan berhasil!');
        } else {
            return redirect()->back()->with('error', 'Tambah Laporan gagal!');
        }
    }
    public function delete($id)
    {
        Penilaian::where("id", $id)->delete();
        return redirect()->back()->with('success', 'Hapus Laporan berhasil!');
    }
}
