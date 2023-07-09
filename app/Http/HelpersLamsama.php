<?php
use Illuminate\Http\Request;
use App\Models\Lembaga;

function hitungNilai87($nilai){
	$keys0 = array_keys($nilai[0]);
	$keys1 = array_keys($nilai[1]);
	$keys2 = array_keys($nilai[2]);
	$keys3 = array_keys($nilai[3]);
	$keys4 = array_keys($nilai[4]);
	$keys5 = array_keys($nilai[5]);
	$keys6 = array_keys($nilai[6]);

	
    $kk = ((3*$nilai[0][$keys0[0]])+(2*$nilai[1][$keys1[0]])+(1*$nilai[2][$keys2[0]]))/$nilai[3][$keys3[0]];
    if($kk >= 4){
    	$skora = 4;
    }else{
    	$skora = $kk;
    }
    $skorb = nilaiYesNoA($nilai[4][$keys4[0]],$nilai[5][$keys5[0]],$nilai[6][$keys6[0]],3,6,9);
    

    $nilaiB[$keys0[0]] = ((2*$skora) + $skorb) /3 ;
    return $nilaiB;
}

function hitungNilai92($nilai){
	$keys0 = array_keys($nilai[0]);
	$keys1 = array_keys($nilai[1]);
	$keys2 = array_keys($nilai[2]);

   	$rmd = $nilai[2][$keys2[0]]/$nilai[0][$keys0[0]];
   	
   	$nilaiB[$keys0[0]] = 4;
    return $nilaiB;
}

function hitungNilai93($nilai){
	if($nilai[1][198] > 0){
		$pds = ($nilai[0][198]/$nilai[1][198])*100;
	}else{
		$pds = 0;
	}
	if($pds > 50){
		$skor[198] = 4;
	}else{
		$skor[198] = 2+2/50*$pds;
	}

	if($nilai[5][199] > 0){
		$pgblkl = ($nilai[2][199]+$nilai[3][199]+$nilai[4][199])/$nilai[5][199];
	}else{
		$pgblkl = 0;
	}
	if($pgblkl >= 70){
		$skor[199] = 4;
	}else{
		$skor[199] = 2+2/70*$pgblkl;
	}

	if($nilai[8][200] > 0){
		$rmd = $nilai[7][200]/$nilai[8][200];
	}else{
		$rmd = 0;
	}

	$tinggi = 'tinggi';
	$saintek = 'saintek';
	$skor_saintek = 4;
	$skor_soshum = '3.70';
	if($tinggi == 'tinggi'){
		if($saintek == 'saintek'){
			$skor[200] = $skor_saintek;
		}else{
			$skor[200] = $skor_soshum;
		}
	}else{
		$skor[200] = 0;
	}

	$rdpu = ($nilai[12][202]+$nilai[13][202])/2;

	if($rdpu == 0 || $rdpu > 10){
		$skor[202] = 0;
	}elseif($rdpu > 6){
		$skor[202] = -2/(10-6)*($rdpu-6)+4;
	}else{
		$skor[202] = 4;
	}

	$ewmp = $nilai[15][203];
	if($ewmp > 18){
		$skor[203] = 0;
	}elseif($ewmp >= 16){
		$skor[203] = -4/(18-16)*($ewmp-16)+4;
	}elseif($ewmp >= 12){
		$skor[203] = 4;
	}elseif($ewmp >= 6){
		$skor[203] = 4/(12-6)*($ewmp-6);
	}else{
		$skor[203] = 0;
	}

	if(($nilai[19][204]+$nilai[20][204]) > 0){
		$pdtt = $nilai[19][204]/($nilai[19][204]+$nilai[20][204])*100;
	}else{
		$pdtt = 0;
	}
	if($pdtt > 40){
		$skor[204] = 0;
	}elseif($pdtt > 10){
		$skor[204] = -2/(40-10)*($pdtt-10)+4;
	}else{
		$skor[204] = 4;
	}

	$skor[205] = 2;
	$nilaiB = $skor;
    return $nilaiB;
}

function hitungNilai94($nilai)
{	
	
	$ri = riRnRl4($nilai[3][206],$nilai[6][206],$nilai[9][206],$nilai[10][206]);
	$rn = riRnRl5($nilai[1][206],$nilai[2][206],$nilai[5][206],$nilai[8][206],$nilai[10][206]);
	$rl = riRnRl4($nilai[0][206],$nilai[4][206],$nilai[7][206],$nilai[10][206]);
	$skor[206] = nilaiYesNo($ri,$rn,$rl,0.1,1,2);

	if($nilai[12][207] > 0){
		$ndtps = $nilai[11][207] / $nilai[12][207];
	}else{
		$ndtps = 0;
	}
	if($ndtps > 0.5){
		$skor[207] = 4;
	}else{
		$skor[207] = 2+2/0.5*$ndtps;
	}

	if($nilai[17][208] > 1){
		$nlp = (2*($nilai[13][208]+$nilai[14][208]+$nilai[15][208])+$nilai[16][208])/$nilai[17][208];
	}else{
		$nlp = 0;
	}
	
	if($nlp >= 1){
		$skor[208] = 4;
	}else{
		$skor[208] = 2+2/1*$nlp ;
	}
	
	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai97($nilai){

	$keys0 = array_keys($nilai[0]);
	$keys1 = array_keys($nilai[2]);
	$keys2 = array_keys($nilai[4]);
	
	$skor[$keys0[0]] = hitungKeuangan($nilai[0][$keys0[0]],$nilai[1][$keys0[0]],20000000,2);
	$skor[$keys1[0]] = hitungKeuangan($nilai[2][$keys1[0]],$nilai[3][$keys1[0]],10000000,3);
	$skor[$keys2[0]] = hitungKeuangan($nilai[4][$keys2[0]],$nilai[5][$keys2[0]],5000000,3);

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai102($nilai, $nilaib){

	$keys0 = array_keys($nilai[0]);
	$keys1 = array_keys($nilai[1]);
	$pjp = bagiDua($nilai[0][$keys0[0]],$nilai[1][$keys0[0]]);
	if($pjp >= $nilaib){
		$skor[$keys0[0]] = 4;
	}else{
		$skor[$keys0[0]] = 4/$nilaib*$pjp;
	}
	

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai110($nilai, $nilaib){

	$keys0 = array_keys($nilai[0]);
	$keys1 = array_keys($nilai[1]);
	$pjp = bagiDua($nilai[0][$keys0[0]],$nilai[1][$keys0[0]])*100;
	
	if($pjp >= $nilaib){
		$skor[$keys0[0]] = 4;
	}else{
		$skor[$keys0[0]] = 4/$nilaib*$pjp;
	}
	

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai113($nilai){
	
	$sumAll251 = $nilai[0][251]+$nilai[1][251]+$nilai[2][251]+$nilai[3][251]+$nilai[4][251]+$nilai[5][251];
	if($sumAll251 > 0){
		$ripk = ($nilai[0][251]*$nilai[3][251]+$nilai[1][251]*$nilai[4][251]+$nilai[2][251]*$nilai[5][251])/$sumAll251;
	}else{
		$ripk = 0;
	}


	if($ripk > 3.25){
		$skor[251] = 4;
	}elseif($ripk > 2){
		$skor[251] = 2/(3.25-2)*($ripk-2)+2;
	}else{
		$skor[251] = 0;
	}
	
	$ri = bagiDua($nilai[6][252],$nilai[9][252])*100;
	$rn = bagiDua($nilai[7][252],$nilai[9][252])*100;
	$rl = bagiDua($nilai[8][252],$nilai[9][252])*100;
	$skor[252] = nilaiYesNoA($ri,$rn,$rl,0.10,1,2);

	$ri2 = bagiDua($nilai[10][253],$nilai[13][253])*100;
	$rn2 = bagiDua($nilai[11][253],$nilai[13][253])*100;
	$rl2 = bagiDua($nilai[12][253],$nilai[13][253])*100;
	$skor[253] = number_format(nilaiYesNo($ri2,$rn2,$rl2,0.2,2,4),2);

	$sumTahunMasuk = $nilai[14][254]+$nilai[16][254]+$nilai[18][254]+$nilai[20][254];
	$sumAllTahunMasuk = $nilai[14][254]+$nilai[15][254]+$nilai[16][254]+$nilai[17][254]+$nilai[18][254]+$nilai[19][254]+$nilai[20][254]+$nilai[21][254];
	if($sumTahunMasuk > 0){
		$ms = $sumAllTahunMasuk/$sumTahunMasuk;
	}else{
		$ms = 0;
	}
	if($ms > 4.5){
		$skor[254] = 0;
	}elseif($ms > 4.5){
		$skor[254] = -4/(4.5-4.5)*($ms-4.5)+4;
	}elseif($ms > 3){
		$skor[254] = 4;
	}elseif($ms > 3){
		$skor[254] = 4/(3-3)*($ms-3);
	}else{
		$skor[254] = 0;
	}

	$sumDiterima = $nilai[22][255]+$nilai[23][255]+$nilai[24][255]+$nilai[25][255];
	$sumAllDiterima = $nilai[26][255]+$nilai[27][255]+$nilai[28][255]+$nilai[29][255];
	if($sumDiterima > 0){
		$ptw = $sumAllDiterima/$sumDiterima;
	}else{
		$ptw = 0;
	}
	if($ptw >= 50){
		$skor[255] = 4;
	}else{
		$skor[255] = 1+3/50*$ptw;
	}

	$array258 = array(
		$nilai[30][258],$nilai[31][258],$nilai[32][258],$nilai[33][258],$nilai[34][258],$nilai[35][258],$nilai[36][258],$nilai[37][258],$nilai[38][258],$nilai[39][258],$nilai[40][258],$nilai[41][258],$nilai[42][258],$nilai[43][258],$nilai[44][258]
	);
	$skor[258] = hitungBanyak($array258);

	$array259 = array(
		$nilai[45][259],$nilai[46][259],$nilai[47][259],$nilai[48][259],$nilai[49][259],$nilai[50][259],$nilai[51][259],$nilai[52][259],$nilai[53][259],$nilai[54][259],$nilai[55][259],$nilai[56][259],$nilai[57][259],$nilai[58][259],$nilai[59][259]
	);
	$skor[259] = hitungBanyak($array259);

	if((4*$nilai[71][261]+3*$nilai[72][261]+2*$nilai[73][261]+$nilai[74][261]) > 4){
        $tk1 = 0;
    }else{
        $tk1 = 4*$nilai[71][261]+3*$nilai[72][261]+2*$nilai[73][261]+$nilai[74][261];
    }
    if((4*$nilai[75][261]+3*$nilai[76][261]+2*$nilai[77][261]+$nilai[78][261]) > 4){
        $tk2 = 0;
    }else{
        $tk2 = 4*$nilai[75][261]+3*$nilai[76][261]+2*$nilai[77][261]+$nilai[78][261];
    }
    if((4*$nilai[79][261]+3*$nilai[80][261]+2*$nilai[81][261]+$nilai[82][261]) > 4){
        $tk3 = 0;
    }else{
        $tk3 = 4*$nilai[79][261]+3*$nilai[80][261]+2*$nilai[81][261]+$nilai[82][261];
    }
    if((4*$nilai[83][261]+3*$nilai[84][261]+2*$nilai[85][261]+$nilai[86][261]) > 4){
        $tk4 = 0;
    }else{
        $tk4 = 4*$nilai[83][261]+3*$nilai[84][261]+2*$nilai[85][261]+$nilai[86][261];
    }
    if((4*$nilai[87][261]+3*$nilai[88][261]+2*$nilai[89][261]+$nilai[90][261]) > 4){
        $tk5 = 0;
    }else{
        $tk5 = 4*$nilai[87][261]+3*$nilai[88][261]+2*$nilai[89][261]+$nilai[90][261];
    }
    if((4*$nilai[91][261]+3*$nilai[92][261]+2*$nilai[93][261]+$nilai[94][261]) > 4){
        $tk6 = 0;
    }else{
        $tk6 = 4*$nilai[91][261]+3*$nilai[92][261]+2*$nilai[93][261]+$nilai[94][261];
    }
    if((4*$nilai[95][261]+3*$nilai[96][261]+2*$nilai[97][261]+$nilai[98][261]) > 4){
        $tk7 = 0;
    }else{
        $tk7 = 4*$nilai[95][261]+3*$nilai[96][261]+2*$nilai[97][261]+$nilai[98][261];
    }
    $sa261 = ($tk1+$tk2+$tk3+$tk4+$tk5+$tk6+$tk7)/7;
    if(0 > 50){
        $skor33[261] = $sa261;
    }else{
        $skor33[261] = 0/50*$sa261;
    }

	$nilaiB = $skor;
	return $nilaiB;

}

