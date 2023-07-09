<?php
use Illuminate\Http\Request;
use App\Models\Lembaga;

function hitungNilai48($nilai){
	if($nilai[3][99] == 0){
		$kk = 0;
	}else{
		$kk = ((3*$nilai[0][99])+(2*$nilai[1][99])+(1*$nilai[2][99])/$nilai[3][99]);
	}
    
    if($kk >= 4){
    	$skora = 4;
    }else{
    	$skora = $kk;
    }

    if($nilai[4][100] >= 2){
        $yes = 'Yes';
    }else{
        $yes = 'No';
    }
    
    if($nilai[4][100] < 2 and $nilai[5][100] >= 6){
        $yes_1 = 'Yes';
    }else{
        $yes_1 = 'No';
    }

    if($nilai[4][100] > 0 || $nilai[4][100] < 2 and $nilai[5][100] == 0){
        $yes_2 = 'Yes';
    }else{
        $yes_2 = 'No';
    }

    if($nilai[4][100] == 0 and $nilai[5][100] == 0 and $nilai[6][100] >= 9){
        $yes_3 = 'Yes';
    }else{
        $yes_3 = 'No';
    }

    if($nilai[4][100] == 0 and $nilai[5][100] == 0 and $nilai[6][100] < 9){
        $yes_4 = 'Yes';
    }else{
        $yes_4 = 'No';
    }

    $nilaiIndikator = array(
        'a' => 2, 'b' => 6, 'c' => 9, 'd' => $yes, 'e' => $yes_1, 'f' => $yes_2, 'g' => $yes_3, 'h' => $yes_4
    );

    if($nilaiIndikator['d'] == 'Yes'){
        $skorBb = 4;
    }elseif($nilaiIndikator['e'] == 'Yes'){
        $skorBb = 3+$nilai[4][100]/2;
    }elseif($nilaiIndikator['f'] == 'Yes'){
        $skorBb = 2+2*$nilai[4][100]/2+$nilai[5][100]/6-($nilai[4][100] * $nilai[5][100])/(6*9);
    }elseif($nilaiIndikator['g'] == 'Yes'){
        $skorBb = 2;
    }else{
        $skorBb = 2*$nilai[6][100]/9;
    }
    

    $nilaiB[48] = ((2*$skora) + $skorBb) /3 ;
    return $nilaiB;
}

function hitungNilai51($nilai){
	$keys0 = array_keys($nilai[0]);
	$keys1 = array_keys($nilai[0]);
	
	$rasio = bagiDua($nilai[0][$keys0[0]],$nilai[1][$keys1[0]]);

	if($rasio >= 5){
		$skor = 4;
	}else{
		$skor = 4/5*$rasio;
	}
	$nilaiB[$keys0[0]] = $skor;
	return $nilaiB;
}

function hitungNilai52($nilai){

	if($nilai[0][108] > 0){
		$pma = ($nilai[1][108]+$nilai[2][108])/$nilai[0][108];
	}else{
		$pma = 0;
	}
	if($pma >= 1){
		$skor = 4;
	}else{
		$skor = 2+2/1*$pma;
	}
	
	$nilaiB[52] = $skor;
	return $nilaiB;
}

function hitungNilai54($nilai){

	ksort($nilai);
	$pdt = ($nilai[1][111]/($nilai[2][111]+$nilai[1][111]))*100;
	$sebelasA = (($nilai[0][111]-3)/9);
	$sebelasB = (40-$pdt)/30;

	if($nilai[0][111] >= 12){
		$skor[111] = 4;
	}elseif($nilai[0][111] >= 3){
		$skor[111] = 2/(12-3)*($nilai[0][111]-3)+2;
	}else{
		$skor[111] = 0;
	}

	if($nilai[4][112] > 0){
		$pds = $nilai[3][112]/$nilai[4][112];
	}else{
		$pds = 0;
	}
	if($pds >= 50){
		$skor[112] = 4;
	}else{
		$skor[112] = 2+2/50*$pds;
	}
	if($nilai[8][113] > 0){
		$pgblkl = ($nilai[5][113]+$nilai[6][113]+$nilai[7][113])/$nilai[8][113];
	}else{
		$pgblkl = 0;
	}
	if($pgblkl >= 70){
		$skor[113] = 4;
	}else{
		$skor[113] = 2+2/70*$pgblkl;
	}

	if($nilai[9][114] > 0){
		$rmd = $nilai[10][114]/$nilai[9][114];
	}else{
		$rmd = 0;
	}

	$tinggi = 'tinggi';
	$saintek = 'saintek';
	$skor_saintek = 4;
	$skor_soshum = '2.53';
	if($tinggi == 'tinggi'){
		if($saintek == 'saintek'){
			$skor[114] = $skor_saintek;
		}else{
			$skor[114] = $skor_soshum;
		}
	}else{
		$skor[114] = 0;
	}

	$rdpu = ($nilai[11][115]+$nilai[12][115])/2;
	if($rdpu == 0 || $rdpu > 10){
		$skor[115] = 0;
	}elseif($rdpu > 6){
		$skor[115] = -2/(10-6)*($rdpu-6)+4;
	}else{
		$skor[115] = 4;
	}

	$ewmp = $nilai[13][116];
	if($ewmp > 18){
		$skor[116] = 0;
	}elseif($ewmp >= 16){
		$skor[116] = -4/(18-16)*($ewmp-16)+4;
	}elseif($ewmp >= 12){
		$skor[116] = 4;
	}elseif($ewmp >= 6){
		$skor[116] = 4/(12-6)*($ewmp-6);
	}else{
		$skor[116] = 0;
	}

	if(($nilai[15][117]+$nilai[16][117]) > 0){
		$pdtt = $nilai[15][117]/($nilai[15][117]+$nilai[16][117])*100;
	}else{
		$pdtt = 0;
	}
	if($pdtt > 40){
		$skor[117] = 0;
	}elseif($pdtt > 10){
		$skor[117] = -2/(40-10)*($pdtt-10)+4;
	}else{
		$skor[117] = 4;
	}
	
	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai55($nilai)
{
	if($nilai[1][118] > 0){
		$rrd = $nilai[0][118]/$nilai[1][118];
	}else{
		$rrd = 0;
	}
	$rrdA = '0.50';
	if($rrd > $rrdA){
		$skor[118] = 4;
	}else{
		$skor[118] = 2+2/$rrdA*$rrd;
	}

	$yesA = 0.05; $yesB = 0.30; $yesC = 1; 
	$ri = riRnRl($nilai[2][119], $nilai[5][119]);
    $rn = riRnRl($nilai[3][119], $nilai[5][119]);
    $rl = riRnRl($nilai[4][119], $nilai[5][119]);
    $skor[119] = nilaiYesNoA($ri,$rn,$rl,$yesA,$yesB,$yesC);

    $ri2 = riRnRl($nilai[6][120], $nilai[9][120]);
    $rn2 = riRnRl($nilai[7][120], $nilai[9][120]);
    $rl2 = riRnRl($nilai[8][120], $nilai[9][120]);
    $skor[120] = nilaiYesNo($ri2,$rn2,$rl2,$yesA,$yesB,$yesC);

    if($nilai[20][121] > 0){
		$ri3 = ($nilai[13][121]+$nilai[16][121]+$nilai[19][121])/$nilai[20][121];
	}else{
		$ri3 = 0;
	}

	if($nilai[20][121] > 0){
		$rn3 = ($nilai[11][121]+$nilai[12][121]+$nilai[15][121]+$nilai[18][121])/$nilai[20][121];
	}else{
		$rn3 = 0;
	}
	if($nilai[20][121] > 0){
		$rl3 = ($nilai[10][121]+$nilai[14][121]+$nilai[17][121])/$nilai[20][121];
	}else{
		$rl3 = 0;
	}
	$skor[121] = nilaiYesNo($ri3,$rn3,$rl3,0.10,1,2);

    $rs = bagiDua($nilai[21][122],$nilai[22][122]);
    if($rs > 0.5){
    	$skor[122] = 4;
    }else{
    	$skor[122] = 2+2/0.5*$rs;
    }

	$nilaiB = $skor;
	
	return $nilaiB;
}

function hitungNilai58($nilai){
	$skor[127] = hitungKeuangan($nilai[0][127],$nilai[1][127],20000000,2);
	$skor[128] = hitungKeuangan($nilai[2][128],$nilai[3][128],10000000,3);
	$skor[129] = hitungKeuangan($nilai[4][129],$nilai[5][129],5000000,3);

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai63($nilai){
	$pjp = bagiDua($nilai[5][144],$nilai[6][144])*100;
	if($pjp >= 20){
		$skor = 4;
	}else{
		$skor = 4/20*$pjp;
	}
	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai71($nilai){
	$tkm1 = hitungNilaiTkm($nilai[0],$nilai[1],$nilai[2],$nilai[3]);
	$tkm2 = hitungNilaiTkm($nilai[4],$nilai[5],$nilai[6],$nilai[7]);
	$tkm3 = hitungNilaiTkm($nilai[8],$nilai[9],$nilai[10],$nilai[11]);
	$tkm4 = hitungNilaiTkm($nilai[12],$nilai[13],$nilai[14],$nilai[15]);
	$tkm5 = hitungNilaiTkm($nilai[16],$nilai[17],$nilai[18],$nilai[19]);
	$sumAll = ($tkm1+$tkm2+$tkm3+$tkm4+$tkm5)/5;

	if($sumAll >= 75){
		$skor = 4;
	}elseif($sumAll >= 25){
		$skor = 4/(75-25)*($sumAll-25);
	}else{
		$kor = 0;
	}
	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai73($nilai){
	$rasio = bagiDua($nilai[0],$nilai[1])*100;
	
	if($rasio >= 25){
		$skor = 4;
	}else{
		$skor = 2+2/25*$rasio;
	}
	$nilaiB = $skor;
	return $nilaiB;

}

function hitungNilai76($nilai){
	$sumAll161 = $nilai[0][161]+$nilai[1][161]+$nilai[2][161]+$nilai[3][161]+$nilai[4][161]+$nilai[5][161];
	if($sumAll161 > 0){
		$ripk = ($nilai[0][161]*$nilai[3][161]+$nilai[1][161]*$nilai[4][161]+$nilai[2][161]*$nilai[5][161])/$sumAll161;
	}else{
		$ripk = 0;
	}


	if($ripk > 3.25){
		$skor[161] = 4;
	}elseif($ripk > 2){
		$skor[161] = 2/(3.25-2)*($ripk-2)+2;
	}else{
		$skor[161] = 0;
	}
	
	$ri = bagiDua($nilai[6][162],$nilai[9][162])*100;
	$rn = bagiDua($nilai[7][162],$nilai[9][162])*100;
	$rl = bagiDua($nilai[8][162],$nilai[9][162])*100;
	$skor[162] = nilaiYesNoA($ri,$rn,$rl,0.10,1,2);

	$ri2 = bagiDua($nilai[10][163],$nilai[13][163])*100;
	$rn2 = bagiDua($nilai[11][163],$nilai[13][163])*100;
	$rl2 = bagiDua($nilai[12][163],$nilai[13][163])*100;
	$skor[163] = number_format(nilaiYesNo($ri2,$rn2,$rl2,0.2,2,4),2);

	$sumTahunMasuk = $nilai[14][164]+$nilai[16][164]+$nilai[18][164]+$nilai[20][164];
	$sumAllTahunMasuk = $nilai[14][164]+$nilai[15][164]+$nilai[16][164]+$nilai[17][164]+$nilai[18][164]+$nilai[19][164]+$nilai[20][164]+$nilai[21][164];
	if($sumTahunMasuk > 0){
		$ms = $sumAllTahunMasuk/$sumTahunMasuk;
	}else{
		$ms = 0;
	}
	if($ms > 4.5){
		$skor[164] = 0;
	}elseif($ms > 4.5){
		$skor[164] = -4/(4.5-4.5)*($ms-4.5)+4;
	}elseif($ms > 3){
		$skor[164] = 4;
	}elseif($ms > 3){
		$skor[164] = 4/(3-3)*($ms-3);
	}else{
		$skor[164] = 0;
	}

	$sumDiterima = $nilai[22][165]+$nilai[23][165]+$nilai[24][165]+$nilai[25][165];
	$sumAllDiterima = $nilai[26][165]+$nilai[27][165]+$nilai[28][165]+$nilai[29][165];
	if($sumDiterima > 0){
		$ptw = $sumAllDiterima/$sumDiterima;
	}else{
		$ptw = 0;
	}
	if($ptw >= 50){
		$skor[165] = 4;
	}else{
		$skor[165] = 1+3/50*$ptw;
	}

	$sumLulus = $nilai[31][166]+$nilai[32][166]+$nilai[33][166]+$nilai[34][166];
	if($nilai[30][166] > 0){
		$mod = ($sumLulus/$nilai[30][166])*100;
	}else{
		$mod = 0;
	}
	if($mod < 6){
		$skor[166] = 4;
	}elseif($mod < 45){
		$skor[166] = (180-(400*$mod))/39;
	}else{
		$skor[166] = 0;
	}

	$array168 = array(
		$nilai[35][168],$nilai[36][168],$nilai[37][168],$nilai[38][168],$nilai[39][168],$nilai[40][168],$nilai[41][168],$nilai[42][168],$nilai[43][168],$nilai[44][168],$nilai[45][168],$nilai[46][168],$nilai[47][168],$nilai[48][168],$nilai[49][168]
	);
	$skor[168] = hitungBanyak($array168);

	$array169 = array(
		$nilai[50][169],$nilai[51][169],$nilai[52][169],$nilai[53][169],$nilai[54][169],$nilai[55][169],$nilai[56][169],$nilai[57][169],$nilai[58][169],$nilai[59][169],$nilai[60][169],$nilai[61][169],$nilai[62][169],$nilai[63][169],$nilai[64][169]
	);
	$skor[169] = hitungBanyak($array169);
	$skor[170] = 0;
	$skor[171] = 0;

	$nilaiB = $skor;
	return $nilaiB;

}

function hitungNilai77($nilai){
	$ri = riRnRl4($nilai[3][172],$nilai[6][172],$nilai[9][172],$nilai[10][172]);
	$rn = riRnRl5($nilai[1][172],$nilai[2][172],$nilai[5][172],$nilai[8][172],$nilai[10][172]);
	$rl = riRnRl4($nilai[0][172],$nilai[4][172],$nilai[7][172],$nilai[10][172]);
	$skor[172] = nilaiYesNo($ri,$rn,$rl,1,10,50);

	$nlp = 2*($nilai[11][173]+$nilai[12][173]+$nilai[13][173])+$nilai[14][173];
	if($nlp >= 1){
		$skor[173] = 4;
	}else{
		$skor[173] = 2+2/1*$nlp ;
	}
	
	$nilaiB = $skor;
	return $nilaiB;

}

function bagiDua($nilaiA, $nilaiB){
	if($nilaiB > 0){
		$nilai = $nilaiA/$nilaiB;
	}else{
		$nilai = 0;
	}
	return $nilai;
}

function riRnRl($nilaiA, $nilaiB){
	if($nilaiB > 0){
		$nilai = $nilaiA/3/$nilaiB;
	}else{
		$nilai = 0;
	}
	return $nilai;
}

function riRnRl4($nilaiA, $nilaiB, $nilaiC, $nilaiD){
	if($nilaiD > 0){
		$nilai = ($nilaiA+$nilaiB+$nilaiC)/$nilaiD;
	}else{
		$nilai = 0;
	}
	return $nilai;
}

function riRnRl5($nilaiA, $nilaiB, $nilaiC, $nilaiD, $nilaiE){
	if($nilaiE > 0){
		$nilai = ($nilaiA+$nilaiB+$nilaiC+$nilaiD)/$nilaiE;
	}else{
		$nilai = 0;
	}
	return $nilai;
}

function nilaiYesNoA($ri,$rn,$rl,$yaA,$yaB,$yaC){
	if($ri >= $yaA){
        $yes = 'Yes';
    }else{
        $yes = 'No';
    }
    if($ri < $yaA AND $rn >= $yaB){
        $yesA = 'Yes';
    }else{
        $yesA = 'No';
    }

    if($ri > 0 || $ri < $yaA || $rn == 0 || $rn > 0 || $rn < $yaB || $ri == 0 ){
        $yesB = 'Yes';
    }else{
        $yesB = 'No';
    }
    

    if($ri == 0 AND $rn == 0 AND $rl >= $yaC){
        $yesC = 'Yes';
    }else{
        $yesC = 'No';
    }

    if($ri == 0 AND $rn == 0 AND $rl < $yaC){
        $yesD = 'Yes';
    }else{
        $yesD = 'No';
    }
    
    if($yes == 'Yes'){
        $skor = 4;
    }elseif($yesA == 'Yes'){
        $skor = 3+$ri/$yaA;
    }elseif($yesB == 'Yes'){
        $skor = 2+2*$ri/$yaA+$rn/$yaB-($ri*$rn)/($yaA*$yaB);
    }elseif($yesC == 'Yes'){
        $skor = 2;
    }else{
        $skor = 2*$rl/$yaC;
    }
    return $skor;
}

function nilaiYesNo($ri,$rn,$rl,$yaA,$yaB,$yaC){
	if($ri >= $yaA){
        $yes = 'Yes';
    }else{
        $yes = 'No';
    }
    if($ri < $yaA AND $rn >= $yaB){
        $yesA = 'Yes';
    }else{
        $yesA = 'No';
    }

    if($ri > 0 || $ri < $yaA AND $rn == 0){
		if($rn > 0 AND $rn < $yaB AND $ri == 0){
			if($ri > 0 AND $ri < $yaA AND $rn > 0 AND $rn < $yaB){
				$yesB = 'Yes';
			}else{
		        $yesB = 'No';
		    }
		}else{
	        $yesB = 'No';
	    }
    }else{
        $yesB = 'No';
    }
    

    if($ri == 0 AND $rn == 0 AND $rl >= $yaC){
        $yesC = 'Yes';
    }else{
        $yesC = 'No';
    }

    if($ri == 0 AND $rn == 0 AND $rl < $yaC){
        $yesD = 'Yes';
    }else{
        $yesD = 'No';
    }

    if($yes == 'Yes'){
        $skor = 4;
    }elseif($yesA == 'Yes'){
        $skor = 3+$ri/$yaA;
    }elseif($yesB == 'Yes'){
        $skor = 2+2*$ri/$yaA+$rn/$yaB-($ri*$rn)/($yaA*$yaB);
    }elseif($yesC == 'Yes'){
        $skor = 2;
    }else{
        $skor = 2*$rl/$yaC;
    }
    return $skor;
}

function hitungKeuangan($nilaiA, $nilaiB, $nilaiC, $nilaiD){
	if($nilaiB > 0){
		$dop = $nilaiA/$nilaiD/$nilaiB*3/3;
	}else{
		$dop = 0;
	}

	if($dop >= $nilaiC){
		$skor = 4;
	}else{
		$skor = 4/$nilaiC*$dop;
	}

	return number_format($skor,2);
}

function hitungNilaiTkm($nilaiA, $nilaiB, $nilaiC, $nilaiD){
	$jumlahAll = (4*$nilaiA+3*$nilaiB+2*$nilaiC+$nilaiD)/4;
	if($jumlahAll > 100){
		$tkm = 0;
	}else{
		$tkm = $jumlahAll*100;
	}

	return $tkm;
}

function hitungBanyak($nilai){

	$lulusTs = $nilai[0]+$nilai[1]+$nilai[2];
	$lulusTs2 = $nilai[3]+$nilai[4]+$nilai[5];
	if($lulusTs > 300){
		$kjl = 1;
	}else{
		$kjl = 2;
	}
	if($lulusTs > 0){
		$presentase = $lulusTs2/$lulusTs;
	}else{
		$presentase = 0;
	}
	if($kjl == 1){
		$pmin = 30;
	}else{
		$pmin = 50-$lulusTs/300*20;
	}

	$sumLulusWt = $nilai[6]+$nilai[7]+$nilai[8]+$nilai[9]+$nilai[10]+$nilai[11]+$nilai[12]+$nilai[14]+$nilai[14];
	if($sumLulusWt > 0){
		$wt = (($nilai[6]+$nilai[9]+$nilai[12])*1.5+($nilai[7]+$nilai[10]+$nilai[14])*4.5+($nilai[8]+$nilai[11]+$nilai[14])*9)/$sumLulusWt;
	}else{
		$wt = 0;
	}
	if($wt >= 6){
		$skorAwala68 = 0;
	}elseif($wt >= 3){
		$skorAwala68 = -4/(6-3)*($wt-3)+4;
	}else{
		$skorAwala68 = 4;
	}
	if($presentase >= $pmin){
		$skor = $skorAwala68;
	}else{
		$skor = $presentase/$pmin*$skorAwala68;
	}

	return $skor;
}