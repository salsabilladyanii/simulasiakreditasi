<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akreditasi;
use App\Models\Penilaian;
use App\Models\User;
use App\Models\Indikator;
use App\Models\Indikator_penilaian;
use App\Models\Lembaga;
use App\Models\Elemen;
use App\Models\Penilaian_akreditasi;
use App\Models\Dokumen_indikator;
use App\Models\NilaiRendah;
use Hash;
use DB;

class AkreditasiController extends Controller
{
    //
    public function index()
    {
        $data   = Penilaian::join('penugasan', 'penugasan.id_penilaian', 'penilaian.id')->select('penilaian.*')->where('id_reviewer', session('auth_user')['id'])->where('status', 1)->get()->all();
        return view('akreditasi.index', compact('data'));
    }

    public function create()
    {
        $dataProdi = Prodi::get();
        return view('akreditasi.create', compact('dataProdi'));
    }

    public function store(Request $request)
    {
        $us = new Akreditasi;
        $us->nama_pt = $request->nama_pt;
        $us->unit_pengelola = $request->unit_pengelola;
        $us->id_prodi = $request->id_prodi;
        $us->lembaga_akreditasi = $request->lembaga_akreditasi;
        $us->ts = $request->ts;
        $us->dokumen = $request->dokumen;
        $us->save();


        if ($us->save()) {
            return redirect('akreditasi')->with('success', 'Tambah Akreditasi berhasil!');
        } else {
            return redirect()->back()->with('error', 'Tambah Akreditasi gagal!');
        }
    }

    public function show($id)
    {
        $data = Penilaian::where('id', $id)->first();
        $detailDokumen = Dokumen_indikator::where('penilaian_id', $id)->first();
        return view('akreditasi.edit', compact('data', 'detailDokumen'));
    }

    public function update(Request $request, $id)
    {

        $us = Akreditasi::where('id', $id)->first();

        $us->nama_pt = $request->nama_pt;
        $us->unit_pengelola = $request->unit_pengelola;
        $us->id_prodi = $request->id_prodi;
        $us->lembaga_akreditasi = $request->lembaga_akreditasi;
        $us->ts = $request->ts;
        $us->dokumen = $request->dokumen;
        $us->save();

        if ($us->save()) {
            return redirect('akreditasi')->with('success', 'Edit Akreditasi berhasil.!');
        } else {
            return redirect()->back()->with('error', 'Edit Akreditasi gagal.!');
        }
    }

    public function destroy($id)
    {
        $data = Akreditasi::where('id', $id)->delete();
        return redirect('akreditasi')->with('success', 'Hapus Akreditasi berhasil.!');
    }

    public function penilaian_akreditas($id, $id_lembaga)
    {
        $data   = Lembaga::get();
        $id_penilaian = $id;
        $data_indikator   = Elemen::join('indikator as ind', 'elemen.id', '=', 'ind.id_elemen')
            ->select('elemen.elemen', 'ind.*')
            ->where('elemen.id_lembaga', '=', $id_lembaga)
            ->orderBy('elemen.id')
            ->get()->all();
        $lembaga_id = $id_lembaga;
        $jj = [];
        foreach ($data_indikator as $key => $value) {
            $dataNilai = Penilaian_akreditasi::where('id_element', $value->id_elemen)->where('id_indikator', $value->id)->first();

            $jj[] = $dataNilai;
        }

        $hitungData = count($data_indikator);
        $hitungData2 = count($jj);
        return view('akreditasi.penilaian', compact('id_penilaian', 'data', 'lembaga_id', 'data_indikator', 'hitungData', 'hitungData2'));
    }

    public function detail_penilaian_akreditas(Request $request)
    {
        $id = $request->id_lembaga;
        $data   = Elemen::join('indikator as ind', 'elemen.id', '=', 'ind.id_elemen')
            ->select('elemen.elemen', 'ind.*')
            ->where('elemen.id_lembaga', '=', $id)
            ->get()->all();
        $id_lembaga = $id;
        return view('akreditasi.detail_penilaian', compact('data', 'id_lembaga'));
    }

    public function simpan_nilai_akreditasi(Request $request)
    {
        Penilaian_akreditasi::where('id_penilaian', $request->id_penilaian)->delete();


        if (!empty($request->skor)) {
            $arrray_id_elemen = [];
            $arrray_id_indikator = [];
            $arrray_id_nilai_indikator = [];
            foreach ($request->skor as $key => $value) {
                $explode[$key] = explode(',', $key);
                $nilai[$key] = $value;
            }
            $nilaiE = [];
            $nilaiEe = [];
            foreach ($explode as $keys => $values) {
                if (count($values) <= 2) {
                    $nilaiE[$keys] = $nilai[$keys];
                } else {
                    $nilaiEe[$keys] = $nilai[$keys];
                }
            }

            foreach ($nilaiE as $keyPisah => $vNilai) {
                $pisah = explode(',', $keyPisah);

                $aa = new Penilaian_akreditasi;
                $aa->id_penilaian = $request->id_penilaian;
                $aa->id_lembaga = $request->id_lembaga;
                $aa->id_element = $pisah[0];
                $aa->id_indikator = $pisah[1];
                $aa->nilai = $vNilai;
                $aa->save();
            }

            foreach ($nilaiEe as $keyPisah_1 => $vNilai_1) {
                $pisah_1 = explode(',', $keyPisah_1);

                $ab = new Penilaian_akreditasi;
                $ab->id_penilaian = $request->id_penilaian;
                $ab->id_lembaga = $request->id_lembaga;
                $ab->id_element = $pisah_1[0];
                $ab->id_indikator = $pisah_1[1];
                $ab->id_indikator_penilaian = $pisah_1[2];
                $ab->nilai = $vNilai_1;
                $ab->save();
            }

            if (!empty($request->deskripsi)) {
                foreach ($request->deskripsi as $key => $value) {
                    $explodeDes[$key] = explode(',', $key);
                    $ss[$key] = $value;
                }
            }

            $des = [];
            foreach ($explodeDes as $keys => $values) {
                $des[$keys] = $ss[$keys];
            }
            foreach ($des as $keydes => $valuedes) {
                $pisahDes = explode(',', $keydes);
                if (!empty($valuedes)) {
                    $nilaiR = new NilaiRendah;
                    $nilaiR->id_elemen = $pisahDes[0];
                    $nilaiR->id_indikator = $pisahDes[1];
                    $nilaiR->catatan = $valuedes;
                    $nilaiR->skor = $nilaiE[$keydes];
                    $nilaiR->id_penilaian = $request->id_penilaian;
                    $nilaiR->save();
                }
            }


            if ($request->selesai == 1) {
                return redirect('hasil-penilaian-akreditasi/' . $request->id_penilaian)->with('success', 'Penilaian Akreditasi berhasil!');
            } else {
                return redirect('akreditasi')->with('success', 'Simpan data nilai berhasil!');
            }
        } else {
            return redirect('akreditasi')->with('error', 'Mohon maaf perhitungan Akreditasi masih dalam pengembangan!');
        }
    }

    public function hasil($id)
    {
        $dataIndikator   = Indikator::join('elemen as e', 'e.id', 'indikator.id_elemen')->select('indikator.*', 'e.elemen')->get()->all();
        $dataNilai   = Penilaian_akreditasi::where('id_penilaian', $id)->get()->all();
        DB::enableQueryLog();
        $dataNilai2   = Penilaian_akreditasi::where('id_penilaian', $id)->first();
        $query = DB::getQueryLog();

        $nilaiA = [];
        $nilaiB = [];

        $p = Penilaian::where('id', $id)->first();
        $p->status = 2;
        $p->save();

        if (!empty($dataNilai2) and $dataNilai2->id_lembaga == 1) {


            foreach ($dataNilai as $key => $value) {
                if (empty($value->id_indikator_penilaian)) {
                    if ($value->id_element == 4 || $value->id_element == 5) {
                        $nilaiA[$value->id_element] = number_format(($value->nilai + (2 * $dataNilai[$key + 1]->nilai)) / 3, 2);
                    } elseif ($value->id_element == 13) {
                        $nilai13[] = $value->nilai;
                    } elseif ($value->id_element == 17) {
                        $nilai17[] = $value->nilai;
                    } elseif ($value->id_element == 20) {
                        $nilai20[] = $value->nilai;
                    } elseif ($value->id_element == 23) {
                        $nilai23[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 25) {
                        $nilai25[] = $value->nilai;
                    } else {
                        $nilaiA[$value->id_element][$value->id_indikator] = $value->nilai;
                    }
                } else {
                    if ($value->id_element == 6) {
                        $nilai6[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 11) {
                        $nilai11[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 12) {
                        $nilai12[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 14) {
                        $nilai14[][$value->id_indikator] = $value->nilai;
                    }
                    if ($value->id_element == 15) {
                        $nilai15[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 18) {
                        $nilai18[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 23) {
                        $nilai23[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 26) {
                        $nilai26[$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 28) {
                        $nilai28[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 30) {
                        $nilai30[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 32) {
                        $nilai32[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 33) {
                        $nilai33[][$value->id_indikator] = $value->nilai;
                    }

                    if ($value->id_element == 34) {
                        $nilai34[][$value->id_indikator] = $value->nilai;
                    }
                }
            }

            $nilaiA[13] = ($nilai13[0] + $nilai13[1]) / 2;
            $nilaiA[17] = ($nilai17[0] + $nilai17[1]) / 2;
            $nilaiA[20][44] = ($nilai20[0] + (2 * $nilai20[1]) + (2 * $nilai20[2])) / 5;
            $nilaiA[23][50] = number_format(($nilai23[0][50] + (2 * $nilai23[1][51]) + (2 * $nilai23[2][52]) + (2 * $nilai23[3][53]) + (2 * $nilai23[4][54])) / 9, 2);
            $nilaiA[25] = ($nilai25[0] + (2 * $nilai25[1]) + (2 * $nilai25[2])) / 5;


            $nilaiB[6][11] = hitungNilaiB6($nilai6);
            if ($nilai11[0][17] > 0) {
                $nilai11 = $nilai11[0][17] / $nilai11[1][17];
            } else {
                $nilai11 = 0;
            }
            if ($nilai11 >= 5) {
                $nilaiA[11][17] = 4;
            } else {
                $nilaiA[11][17] = 4 / 5 * $nilai11;
            }

            if ($nilai12[0][19] > 0) {
                $nilai12 = $nilai12[1][19] + $nilai12[2][19] / $nilai12[0][19];
            } else {
                $nilai12 = 0;
            }
            if ($nilai12 >= 1) {
                $skorB12 = 4;
            } else {
                $skorB12 = 2 + 2 / 1 * $nilai12;
            }
            $nilaiB[12][19] = number_format((2 * $nilaiA[12][18] + $skorB12) / 3, 2);



            $nilaiA[14] = hitungNilaiB14($nilai14);
            $nilaiA[15] = hitungNilaiB15($nilai15);

            $nilaiB[18] = hitungNilaiB18($nilai18);
            $nilaiB[23] = hitungNilaiB23($nilai23);
            $nilaiA[26] = $nilai26;
            $jj = hitungNilaiB28($nilai28);
            $nilaiB[28][63] = number_format(($jj[63] + 2 * $nilaiA[28][64]) / 3, 2);
            $nilaiA[30] = hitungNilaiB30($nilai30);
            $nilaiA[32] = hitungNilaiB32($nilai32);
            $nilaiB[33] = hitungNilaiB33($nilai33);
            $nilaiA[34] = hitungNilaiB34($nilai34);

            $nilaiA[6] = array_replace($nilaiA[6], $nilaiB[6]);
            $nilaiA[12] = $nilaiB[12];
            $nilaiA[18] = array_replace($nilaiB[18], $nilaiA[18]);
            $nilaiA[23] = array_replace($nilaiA[23], $nilaiB[23]);
            $nilaiA[28] = array_replace($nilaiA[28], $nilaiB[28]);
            $nilaiA[33] = array_replace($nilaiA[33], $nilaiB[33]);
            ksort($nilaiA[33]);
            ksort($nilaiA);

            foreach ($nilaiA as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $keys => $values) {
                        $dataI = Indikator::where('id', $keys)->first();
                        if (!empty($dataI->skor_min)) {
                            $nilaiMin[$dataI->id] = $dataI->skor_min;
                            $nilaiMinA[$dataI->id] = $values;
                        }
                        if (!empty($dataI->skor_min_2)) {
                            $nilaiMin2[$dataI->id] = $dataI->skor_min;
                            $nilaiMinA2[$dataI->id] = $values;
                        }
                    }
                }
            }

            foreach ($nilaiMinA as $k => $v) {
                foreach ($nilaiMin as $kk => $vv) {
                    if ($k == $kk) {

                        if ($v > $vv) {
                            $syarat[$kk] = 'Terpenuhi';
                        } else {
                            $syarat[$kk] = 'Tidak Terpenuhi';
                        }
                    }
                }
            }
            foreach ($nilaiMinA2 as $k2 => $v2) {
                foreach ($nilaiMin2 as $kk2 => $vv2) {
                    if ($k2 == $kk2) {

                        if ($v2 > $vv2) {
                            $syarat2[$kk2] = 'Terpenuhi';
                        } else {
                            $syarat2[$kk2] = 'Tidak Terpenuhi';
                        }
                    }
                }
            }
            return view('akreditasi.hasil', compact('dataIndikator', 'dataNilai', 'nilaiA', 'nilaiB', 'syarat', 'syarat2'));
        } elseif (!empty($dataNilai2) and $dataNilai2->id_lembaga == 2) {
            foreach ($dataNilai as $key => $value) {
                if (empty($value->id_indikator_penilaian)) {
                    if ($value->id_element == 47) {
                        $nilai47[] = $value->nilai;
                    } elseif ($value->id_element == 53) {
                        $nilai53[] = $value->nilai;
                    } elseif ($value->id_element == 60) {
                        $nilai60[] = $value->nilai;
                    } elseif ($value->id_element == 62) {
                        $nilai62[] = $value->nilai;
                    } elseif ($value->id_element == 63) {
                        $nilai63[] = $value->nilai;
                    } elseif ($value->id_element == 65) {
                        $nilai65[] = $value->nilai;
                    } else {
                        $nilaiLampteknik[$value->id_element][$value->id_indikator] = $value->nilai;
                    }
                } else {
                    if ($value->id_element == 48) {
                        $nilai48[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 51) {
                        $nilai51[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 52) {
                        $nilai52[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 54) {
                        $nilai54[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 55) {
                        $nilai55[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 58) {
                        $nilai58[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 63) {
                        $nilai63[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 71) {
                        $nilai71[] = $value->nilai;
                    } elseif ($value->id_element == 73) {
                        $nilai73[] = $value->nilai;
                    } elseif ($value->id_element == 75) {
                        $nilai75[] = $value->nilai;
                    } elseif ($value->id_element == 76) {
                        $nilai76[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 77) {
                        $nilai77[][$value->id_indikator] = $value->nilai;
                    } else {
                        $nilaiB[$value->id_element][$value->id_indikator] = $value->nilai;
                    }
                }
            }

            $nilaiB52 = hitungNilai52($nilai52);

            $nilaiLampteknik[47][96] = ($nilai47[0] + 2 * $nilai47[1]) / 3;
            $nilaiLampteknik[53][109] = ($nilai53[0] + 2 * $nilai53[1]) / 3;
            $nilaiLampteknik[60][133] = ($nilai60[0] + 2 * $nilai60[1] + 2 * $nilai60[2]) / 5;
            $nilaiLampteknik[62][137] = ($nilai62[0] + 2 * $nilai62[1]) / 3;
            $nilaiLampteknikA[63][139] = number_format(($nilai63[0] + (2 * $nilai63[1]) + (2 * $nilai63[2]) + (2 * $nilai63[3]) + (2 * $nilai63[4])) / 9, 2);
            $nilaiLampteknik[65][146] = ($nilai65[0] + 2 * $nilai65[1] + 2 * $nilai65[2]) / 5;
            $nilaiLampteknikA[71][155] = $nilaiLampteknik[71][155];

            $nilaiLampteknik[48] = hitungNilai48($nilai48);
            $nilaiLampteknik[51] = hitungNilai51($nilai51);
            $nilaiLampteknik[52][107] = (2 * $nilaiLampteknik[52][107] + $nilaiB52[52]) / 3;
            $nilaiLampteknik[54] = hitungNilai54($nilai54);
            $nilaiLampteknik[55] = hitungNilai55($nilai55);
            $nilaiLampteknik[58] = hitungNilai58($nilai58);
            $nilaiLampteknikB[63][144] = hitungNilai63($nilai63);
            $nilaiLampteknikB[71][154] = hitungNilai71($nilai71);
            $nilaiLampteknik[73][157] = hitungNilai73($nilai73);
            $nilaiLampteknik[75][159] = hitungNilai73($nilai75);
            $nilaiLampteknik[76] = hitungNilai76($nilai76);
            $nilaiLampteknik[77] = hitungNilai77($nilai77);

            $nilaiLampteknik[63] = array_replace($nilaiLampteknikA[63], $nilaiLampteknikB[63]);
            $nilaiLampteknik[71] = array_replace($nilaiLampteknikA[71], $nilaiLampteknikB[71]);
            ksort($nilaiLampteknik[63]);
            ksort($nilaiLampteknik[71]);
            ksort($nilaiLampteknik);

            foreach ($nilaiLampteknik as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $keys => $values) {
                        $dataI = Indikator::where('id', $keys)->first();
                        if (!empty($dataI)) {
                            $nilaiMin[$dataI->id] = $dataI->skor_min;
                            $nilaiMinA[$dataI->id] = $values;
                        }
                        if (!empty($dataI->skor_min_2)) {
                            $nilaiMin2[$dataI->id] = $dataI->skor_min;
                            $nilaiMinA2[$dataI->id] = $values;
                        }
                    }
                }
            }

            foreach ($nilaiMinA as $k => $v) {
                foreach ($nilaiMin as $kk => $vv) {
                    if ($k == $kk) {

                        if ($v > $vv) {
                            $syarat[$kk] = 'Terpenuhi';
                        } else {
                            $syarat[$kk] = 'Tidak Terpenuhi';
                        }
                    }
                }
            }

            foreach ($nilaiMinA2 as $k2 => $v2) {
                foreach ($nilaiMin2 as $kk2 => $vv2) {
                    if ($k2 == $kk2) {

                        if ($v2 > $vv2) {
                            $syarat2[$kk2] = 'Terpenuhi';
                        } else {
                            $syarat2[$kk2] = 'Tidak Terpenuhi';
                        }
                    }
                }
            }


            return view('akreditasi.hasilLampteknik', compact('dataIndikator', 'nilaiLampteknik', 'nilaiLampteknikA', 'nilaiLampteknikB', 'syarat', 'syarat2'));
        } elseif (!empty($dataNilai2) and $dataNilai2->id_lembaga == 5) {
            foreach ($dataNilai as $key => $value) {
                if (empty($value->id_indikator_penilaian)) {
                    if ($value->id_element == 91) {
                        $nilai91[] = $value->nilai;
                    } elseif ($value->id_element == 96) {
                        $nilai96[] = $value->nilai;
                    } elseif ($value->id_element == 99) {
                        $nilai99[] = $value->nilai;
                    } elseif ($value->id_element == 101) {
                        $nilai101[] = $value->nilai;
                    } elseif ($value->id_element == 102) {
                        $nilai102[] = $value->nilai;
                    } else {
                        $nilaiLamsama[$value->id_element][$value->id_indikator] = $value->nilai;
                    }
                } else {
                    if ($value->id_element == 87) {
                        $nilai87[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 90) {
                        $nilai90[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 92) {
                        $nilai92[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 93) {
                        $nilai93[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 94) {
                        $nilai94[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 97) {
                        $nilai97[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 102) {
                        $nilaiB102[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 105) {
                        $nilai105[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 108) {
                        $nilai108[] = $value->nilai;
                    } elseif ($value->id_element == 110) {
                        $nilai110[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 112) {
                        $nilai112[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 113) {
                        $nilai113[][$value->id_indikator] = $value->nilai;
                    } else {
                        $nilaiB[$value->id_element][$value->id_indikator][] = $value->nilai;
                    }
                }
            }
            //debugCode($nilai105);
            $nilaiLamsama[91][195] = ($nilai91[0] + 2 * $nilai91[1]) / 3;
            $nilaiLamsama[96][210] = ($nilai96[0] + $nilai96[1]) / 2;
            $nilaiLamsama[99][218] = ($nilai99[0] + 2 * $nilai99[1] + 2 * $nilai99[2]) / 5;
            $nilaiLamsama[101][222] = ($nilai101[0] + 2 * $nilai101[1]) / 3;
            $nilaiLamsamaA[102][224] = ($nilai102[0] + 2 * $nilai102[1] + 2 * $nilai102[2]) / 5;
            $nilaiLamsamaB[102] = hitungNilai102($nilaiB102, 20);

            $nilaiLamsama[87] = hitungNilai87($nilai87);
            $nilaiLamsama[90] = hitungNilai51($nilai90);
            $nilaiLamsama[92] = hitungNilai92($nilai92);
            $nilaiLamsama[93] = hitungNilai93($nilai93);
            $nilaiLamsama[94] = hitungNilai94($nilai94);
            $nilaiLamsama[97] = hitungNilai97($nilai97);
            $nilaiLamsama[108][244] = hitungNilai71($nilai108);
            $nilaiLamsama[110] = hitungNilai110($nilai110, 25);
            $nilaiLamsama[112] = hitungNilai110($nilai112, 25);
            $nilaiLamsama[113] = hitungNilai113($nilai113);
            $nilaiLamsama[102] = array_replace($nilaiLamsamaA[102], $nilaiLamsamaB[102]);
            if ($nilai105[0][236] > 9) {
                $nilaiLamsama[105][236] = 4;
            } elseif ($nilai105[0][236] == 5) {
                $nilaiLamsama[105][236] = 3;
            } else {
                $nilaiLamsama[105][236] = 2;
            }
            ksort($nilaiLamsama);

            foreach ($nilaiLamsama as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $keys => $values) {
                        $dataI = Indikator::where('id', $keys)->first();
                        if (!empty($dataI)) {
                            $nilaiMin[$dataI->id] = $dataI->skor_min;
                            $nilaiMinA[$dataI->id] = $values;
                        }
                        if (!empty($dataI->skor_min_2)) {
                            $nilaiMin2[$dataI->id] = $dataI->skor_min;
                            $nilaiMinA2[$dataI->id] = $values;
                        }
                    }
                }
            }

            foreach ($nilaiMinA as $k => $v) {
                foreach ($nilaiMin as $kk => $vv) {
                    if ($k == $kk) {

                        if ($v > $vv) {
                            $syarat[$kk] = 'Terpenuhi';
                        } else {
                            $syarat[$kk] = 'Tidak Terpenuhi';
                        }
                    }
                }
            }

            foreach ($nilaiMinA2 as $k2 => $v2) {
                foreach ($nilaiMin2 as $kk2 => $vv2) {
                    if ($k2 == $kk2) {

                        if ($v2 > $vv2) {
                            $syarat2[$kk2] = 'Terpenuhi';
                        } else {
                            $syarat2[$kk2] = 'Tidak Terpenuhi';
                        }
                    }
                }
            }
            return view('akreditasi.hasilnilaiLamsama', compact('dataIndikator', 'nilaiLamsama', 'nilaiLamsamaA', 'nilaiLamsamaB', 'syarat', 'syarat2'));
        } elseif (!empty($dataNilai2) and $dataNilai2->id_lembaga == 3) {
            foreach ($dataNilai as $key => $value) {
                if (empty($value->id_indikator_penilaian)) {

                    $nilaiLaminfokom[$value->id_element][$value->id_indikator] = $value->nilai;
                } else {
                    if ($value->id_element == 123) {
                        $nilai123[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 124) {
                        $nilai124[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 125) {
                        $nilai125[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 126) {
                        $nilai126[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 127) {
                        $nilai127[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 128) {
                        $nilai128[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 129) {
                        $nilai129[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 130) {
                        $nilai130[][$value->id_indikator] = $value->nilai;
                    } else {
                        $nilaiB[$value->id_element][$value->id_indikator][] = $value->nilai;
                    }
                }
            }
            $nilaiLaminfokom[123] = hitungNilai123($nilai123);
            $nilaiLaminfokom[124] = hitungNilai124($nilai124);
            $nilaiLaminfokom[125] = hitungNilai125($nilai125);
            $nilaiLaminfokom[126] = hitungNilai126($nilai126);
            $nilaiLaminfokom[127] = hitungNilai127($nilai127);
            $nilaiLaminfokom[128] = hitungNilai128($nilai128);
            $nilaiLaminfokom[129] = hitungNilai129($nilai129);
            $nilaiLaminfokom[130] = hitungNilai130($nilai130);

            $sumAll = 0;
            foreach ($nilaiLaminfokom as $key => $value) {

                $sum = 0;
                foreach ($value as $keys => $values) {
                    $sum += $values;
                }
                $sumAll += $sum;
            }
            return view('akreditasi.hasilnilaiLaminfokom', compact('dataIndikator', 'nilaiLaminfokom', 'sumAll'));
        } else {

            foreach ($dataNilai as $key => $value) {
                if (empty($value->id_indikator_penilaian)) {
                    $nilaiLamptkes[$value->id_element][$value->id_indikator] = $value->nilai;
                } else {
                    if ($value->id_element == 119) {
                        $nilai119[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 122) {
                        $nilai122[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 138) {
                        $nilai138[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 139) {
                        $nilai139[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 141) {
                        $nilai141[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 142) {
                        $nilai142[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 143) {
                        $nilai143[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 145) {
                        $nilai145[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 146) {
                        $nilai146[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 147) {
                        $nilai147[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 150) {
                        $nilai150[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 151) {
                        $nilai151[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 153) {
                        $nilai153[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 155) {
                        $nilai155[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 157) {
                        $nilai157[][$value->id_indikator] = $value->nilai;
                    } elseif ($value->id_element == 158) {
                        $nilai158[][$value->id_indikator] = $value->nilai;
                    } else {
                        $nilaiB[$value->id_element][$value->id_indikator][] = $value->nilai;
                    }
                }
            }

            $nilaiLamptkes[119] = hitungNilai119($nilai119);
            $nilaiLamptkes[122] = hitungNilai122($nilai122);
            $nilaiLamptkes[138] = hitungNilai138($nilai138);
            $nilaiLamptkes[139] = hitungNilai139($nilai139);
            $nilaiLamptkes[141] = hitungNilai141($nilai141);
            $nilaiLamptkes[142] = hitungNilai142($nilai142);
            $nilaiLamptkes[143] = hitungNilai143($nilai143);
            $nilaiLamptkes[145] = hitungNilai145($nilai145);
            $nilaiLamptkes[146] = hitungNilai146($nilai146);
            $nilaiLamptkes[147] = hitungNilai147($nilai147);
            $nilaiLamptkes[150] = hitungNilai150($nilai150);
            $nilaiLamptkes[151] = hitungNilai151($nilai151);
            $nilaiLamptkes[153] = hitungNilai153($nilai153);
            $nilaiLamptkes[155] = hitungNilai155($nilai155);
            $nilaiLamptkes[157] = hitungNilai157($nilai157);
            $nilaiLamptkes[158] = hitungNilai158($nilai158);

            ksort($nilaiLamptkes);

            $sumAll = 0;
            foreach ($nilaiLamptkes as $key => $value) {

                $sum = 0;
                foreach ($value as $keys => $values) {
                    $sum += $values;
                }
                $sumAll += $sum;
            }

            return view('akreditasi.hasilLamptkes', compact('dataIndikator', 'nilaiLamptkes', 'sumAll'));
        }

        return redirect('akreditasi')->with('error', 'Perhitungan Akreditasi masih dalam pengembangan!');
    }
}
