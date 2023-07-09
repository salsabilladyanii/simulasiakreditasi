<?php
use Illuminate\Http\Request;
use App\Models\Lembaga;

function hitungNilai123($nilai)
{	
	$rk = ((3*$nilai[0][288])+(2*$nilai[1][288])+(2*$nilai[2][288]))/$nilai[3][288];

	if($rk >= 4){
		$skor[288] = 4;
	}else{
		$skor[288] = 4-4*(4*$rk)/4;
	}

	$r = ((3*$nilai[4][289])+(2*$nilai[5][289])+(2*$nilai[6][289]))/$nilai[7][289];

	if($rk >= 3 AND $nilai[4][289] != 0){
		$skor[289] = 4;
	}elseif($nilai[4][289] > 0){
		$skor[289] = (4-4*(3-$r)/3);
	}else{
		$skor[289] = (4-4*(3-$r)/3)-0.5;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai124($nilai)
{	
	if($nilai[0][293] >= 75){
		$skor[293] = 4;
	}elseif($nilai[0][293] < 25){
		$skor[293] = 0;
	}else{
		$skor[293] = (4-4*(75-$nilai[0][293])/50)*100;
	}

	if($nilai[1][295] >= 4){
		$skor[295] = 4;
	}else{
		$skor[295] = $nilai[1][295];
	}

	if($nilai[2][297] >= 10){
		$skor[297] = 4;
	}else{
		$skor[297] = (4-4*(10-$nilai[2][297])/10)*100;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai125($nilai)
{	
	
	if($nilai[0][298] >= 12){
		$skor[298] = 4;
	}elseif(6 <= $nilai[0][298] AND $nilai[0][298] < 12){
		$skor[298] = 4-2*(12*$nilai[0][298])/7;
	}elseif($nilai[0][298] == 5 AND $nilai[1][298] == 0 || $nilai[0][298] == 4 AND $nilai[1][298] == 1 || $nilai[0][298] == 3 AND $nilai[1][298] == 2){
		$skor[298] = 2;
	}else{
		$skor[298] = 0;
	}

	if($nilai[2][299] >= 50){
		$skor[299] = 4;
	}else{
		$skor[299] = (4-2*(50*$nilai[2][299])/50)*100;
	}

	if($nilai[3][300] <= 6){
		$skor[300] = 4;
	}elseif(6 <= $nilai[3][300] AND [3][300] <= 10){
		$skor[300] = 7-($nilai[3][300]/3);
	}elseif($nilai[3][300] == 0){
		$skor[300] = 2;
	}else{
		$skor[300] = 0;
	}

	if(12 <= $nilai[4][301] AND $nilai[4][301] <= 13){
		$skor[301] = 4;
	}elseif(13 <= $nilai[4][301] AND $nilai[4][301] <= 16){
		$skor[301] = 4-1*($nilai[4][301]-13)/3;
	}elseif($nilai[4][301] < 12 || $nilai[4][301] > 16){
		$skor[301] = 1;
	}else{
		$skor[301] = 0;
	}

	if($nilai[5][302] >= 60){
		$skor[302] = 4;
	}else{
		$skor[302] = (4-2*(60-$nilai[5][302])/60)*100;
	}

	if($nilai[6][303] == 0){
		$skor[303] = 4;
	}else{
		$skor[303] = 4-4*($nilai[6][303])/8;
	}

	if($nilai[7][304] >= 50){
		$skor[304] = 4;
	}elseif($nilai[7][304] == 0){
		$skor[304] = 0;
	}else{
		$skor[304] = (4-2*(50-$nilai[7][304])/50)*100;
	}

	if($nilai[8][305] >= 25){
		$skor[305] = 4;
	}elseif($nilai[8][305] == 0){
		$skor[305] = 0;
	}else{
		$skor[305] = (4-2*(25-$nilai[8][305])/25)*100;
	}

	if($nilai[9][307] >= 20){
		$skor[307] = 4;
	}elseif($nilai[9][307] == 0){
		$skor[307] = 0;
	}else{
		$skor[307] = (4-2*(20-$nilai[9][307])/20)*100;
	}

	$sx = ((4*$nilai[10][308])+(3*$nilai[11][308])+(2*$nilai[12][308])+$nilai[13][308])/4/$nilai[14][308];
	if($sx >= 0.05){
		$skor[308] = 4;
	}else{
		$skor[308] = 4-4*(0.05-$sx)/0.05;
	}

	$tek = ((4*$nilai[15][309])+(3*$nilai[16][309])+$nilai[17][309])/3/$nilai[18][309];
	if($tek >= 0.066){
		$skor[309] = 4;
	}elseif($tek == 0){
		$skor[309] = 2;
	}else{
		$skor[309] = 4-3*(0.066-$sx)/0.066;
	}

	if($nilai[19][311] >= 75){
		$skor[311] = 4;
	}else{
		$skor[311] = (4-4*(75-$nilai[19][311])/75)*100;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai126($nilai)
{	
	if($nilai[0][314] <= 75){
		$skor[314] = 4;
	}elseif($nilai[0][314] == 0){
		$skor[314] = 2;
	}else{
		$skor[314] = (4-2*($nilai[0][314]-75)/25)*100;
	}

	$skor[315] = $nilai[1][315]/11;

	if($nilai[2][316] >= 	5){
		$skor[316] = 4;
	}else{
		$skor[316] = 4-4*(5-$nilai[2][316])/5;
	}

	$skor[317] = ($nilai[3][317]+$nilai[4][317]+$nilai[5][317])/3;
	$skor[318] = ($nilai[6][318]+$nilai[7][318]+$nilai[8][318])/3;

	if($nilai[9][319] == 100){
		$skor[319] = 4;
	}elseif($nilai[9][319] == 0){
		$skor[319] = 2;
	}else{
		$skor[319] = (4-4*(100-$nilai[9][319])/100)*100;
	}

	if($nilai[10][322] >= 200){
		$skor[322] = 4;
	}else{
		$skor[322] = 4-4*(200-$nilai[10][322])/200;
	}
	if($nilai[11][323] == 10){
		$skor[323] = 4;
	}elseif($nilai[11][323] == 0){
		$skor[323] = 0;
	}else{
		$skor[323] = (4-4*(100-$nilai[11][323])/100)*100;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai127($nilai)
{	
	if($nilai[0][326] == 0 AND $nilai[1][326] == 0){
		$skor[326] = 0;
	}else{
		$skor[326] = ($nilai[0][326] + $nilai[1][326])/2;
	}

	if($nilai[2][330] >= 30){
		$skor[330] = 4;
	}elseif($nilai[2][330] == 0){
		$skor[330] = 2;
	}else{
		$skor[330] = (4-2*(30-$nilai[2][330])/(30-15))*100;
	}

	if($nilai[3][331] >= 5){
		$skor[331] = 0;
	}else{
		$skor[331] = (4-4*(5-$nilai[3][331])/5)*100;
	}

	$skor[332] = ($nilai[4][332]+$nilai[5][332]+$nilai[6][332]+$nilai[7][332]+$nilai[8][332]+$nilai[9][332])/6;

	$nisbah = ($nilai[10][334]/$nilai[11][334])*100;

	if($nisbah >= 50){
		$skor[334] = 4;
	}else{
		$skor[334] = (4-4*(50-$nisbah)/50)*100;
	}

	if($nilai[12][335] == 100){
		$skor[335] = 4;
	}elseif($nilai[12][335] == 0){
		$skor[335] = 2;
	}else{
		$skor[335] = (4-3*(100-$nilai[12][335])/100)*100;
	}

	$skor[340] = ($nilai[13][340]+$nilai[14][340]+$nilai[15][340])/3;

	if($nilai[16][342] >= 10){
		$skor[342] = 4;
	}elseif($nilai[16][342] == 0){
		$skor[342] = 2;
	}else{
		$skor[342] = (4-2*(10-$nilai[16][342])/10)*100;
	}

	if($nilai[17][343] >= 5){
		$skor[343] = 4;
	}else{
		$skor[343] = (4-4*(5-$nilai[17][343])/5)*100;
	}

	$nilaiB = $skor;
	return $nilaiB;

}

function hitungNilai128($nilai)
{	

	$skor[346] = ($nilai[0][346]+$nilai[1][346]+$nilai[2][346])/3;
	$skor[347] = ($nilai[3][347]+$nilai[4][347]+$nilai[5][347]+$nilai[6][347])/4;

	if($nilai[7][349] >= 10){
		$skorA = 4;
	}else{
		$skorA = (4-4*(10-$nilai[7][349])/10)*100;
	}
	if($nilai[8][350] >= 3){
		$skorB = 4;
	}elseif($nilai[8][350] == 0){
		$skorB = 0;
	}else{
		$skorB = 4-4*(3-$nilai[8][350])/3;
	}
	$skor[349] = ($skorA+2*$skorB)/3;

	$nilaiB = $skor;
	return $nilaiB;

}

function hitungNilai129($nilai)
{	
	$skor[352] = ($nilai[0][352]+$nilai[1][352]+$nilai[2][352]+$nilai[3][352])/4;

	if($nilai[4][353] == 50){
		$skora = 4;
	}elseif($nilai[4][353] == 0){
		$skora = 2;
	}else{
		$skora = (4-2*(50-$nilai[4][353])/50)*100;
	}

	if($nilai[5][354] >= 4){
		$skorb = 4;
	}elseif($nilai[5][354] == 0){
		$skorb = 2;
	}else{
		$skorb = (4-2*(50-$nilai[5][354])/50)*100;
	}
	$skor[353] = ($skora+2*$skorb)/3;

	if($nilai[6][355] >= 2.5){
		$skor[355] = 4;
	}else{
		$skor[355] = (4-4*(2.5-$nilai[6][355])/2.5)*100;
	}

	$nk = (4*$nilai[7][356]+2*$nilai[8][356]+$nilai[9][356])/$nilai[10][356];

	if($nk >= 6){
		$skor[356] = 4;
	}else{
		$skor[356] = (4-4*(6-$nk)/6)*100;
	}
	$nilaiB = $skor;
	return $nilaiB;

}

function hitungNilai130($nilai)
{	

	$skor[358] = ($nilai[0][358]+$nilai[1][358]+$nilai[2][358])/3;

	if($nilai[3][359] >= 3.15){
		$skor[359] = 4;
	}elseif($nilai[3][359] <= 2){
		$skor[359] = 1;
	}else{
		$skor[359] = 4-2*(3.15-$nilai[3][359])/3.15;
	}

	if($nilai[4][360] >= (6*$nilai[4][360])){
		$skor[360] = 4;
	}elseif($nilai[4][360] == 0){
		$skor[360] = 1;
	}else{
		$skor[360] = 4-3*((6*$nilai[4][360])-$nilai[5][360])/(6*$nilai[4][360]);
	}

	if($nilai[6][361] >= (2*$nilai[6][361])){
		$skor[361] = 4;
	}elseif($nilai[6][361] == 0){
		$skor[361] = 1;
	}else{
		$skor[361] = 4-3*((2*$nilai[6][361])-$nilai[7][361])/(2*$nilai[6][361]);
	}

	if($nilai[8][362] >= (2*$nilai[8][362])){
		$skor[362] = 4;
	}elseif($nilai[8][362] == 0){
		$skor[362] = 1;
	}else{
		$skor[362] = 4-3*((2*$nilai[8][362])-$nilai[9][362])/(2*$nilai[8][362]);
	}

	if($nilai[10][363] >= 60){
		$skor[363] = 4;
	}elseif($nilai[10][363] == 0){
		$skor[363] = 0;
	}elseif($nilai[11][363] < 4 AND $nilai[12][363]){
		$skor[363] = 2;
	}else{
		$skor[363] = (4-4*(60-$nilai[10][363])/60)*100;
	}

	if($nilai[13][364] <= 10){
		$skor[364] = 4;
	}elseif($nilai[13][364] >= 40){
		$skor[364] = 0;
	}else{
		$skor[364] = 4-2*($nilai[13][364]-10)/(40-10);
	}

	if($nilai[14][367]/$nilai[15][367] > 1){
		$k = 1;
	}else{
		$k = 0;
	}
	$jj = 2+$k*(4*$nilai[16][367]+3*$nilai[17][367]+2*$nilai[18][367]+$nilai[19][367]);

	if($jj > 4){
		$skor[367] = 4;
	}else{
		$skor[367] = 2;
	}

	if($nilai[20][368] <= 1){
		$skor[368] = 4;
	}elseif($nilai[20][368] == 0){
		$skor[368] = 2;
	}else{
		$sko4[368] = 4-2*($nilai[20][368]-1)/(18-1);
	}

	if($nilai[21][369] >= 70){
		$skor[369] = 4;
	}elseif($nilai[21][369] <= 20){
		$skor[369] = 2;
	}else{
		$sko4[369] = 4-2*(70-$nilai[21][369])/(70-20);
	}

	$spa = 4-2*(1-$nilai[22][370])/1;
	$spb = 4-2*(50-$nilai[23][370])/50;
	$spc = 4-2*(5-$nilai[24][370])/5;
	$max = max($spa, $spb, $spc);

	if($nilai[22][370] >= 1 || $nilai[23][370] >= 50 || $nilai[24][370] >= 5){
		$skor[370] = 4;
	}elseif($nilai[22][370] == 0 || $nilai[23][370] == 0 || $nilai[24][370] == 0){
		$skor[370] = 2;
	}else{
		$sko4[370] = $max;
	}

	if($nilai[25][372] >= 50){
		$skor[372] = 4;
	}elseif($nilai[25][372] == 0){
		$skor[372] = 2;
	}else{
		$skor[372] = (4-2*(50-$nilai[25][372])/50)*100;
	}

	if($nilai[26][373] >= 75){
		$skor[373] = 4;
	}elseif($nilai[26][373] == 0){
		$skor[373] = 2;
	}else{
		$skor[373] = (4-2*(75-$nilai[26][373])/75)*100;
	}

	if($nilai[27][374] >= 10){
		$skor[374] = 4;
	}elseif($nilai[27][374] == 0){
		$skor[374] = 0;
	}else{
		$skor[374] = (4-4*(10-$nilai[27][374])/10)*100;
	}

	$nk = (3*$nilai[28][375]+6*$nilai[29][375]+10*$nilai[30][375]+12*$nilai[31][375])/$nilai[32][375];
	if($nk >= 3){
		$skor[375] = 4;
	}elseif($nk == 0){
		$skor[375] = 0;
	}else{
		$skor[375] = 4-4*(3-$nk)/3;
	}

	if($nilai[33][377] >= 50){
		$skor[377] = 4;
	}elseif($nilai[33][377] == 0){
		$skor[377] = 0;
	}else{
		$skor[377] = (4-3*(50-$nilai[33][377])/50)*100;
	}
	
	if($nilai[38][378] == 0){
		$nk2 = 0;
	}else{
		$nk2 = (4*$nilai[34][378]+3*$nilai[35][378]+2*$nilai[36][378]+1*$nilai[37][378])/(3*$nilai[38][378]);
	}
	
	if($nk2 >= 75){
		$skor[378] = 4;
	}elseif($nk2 == 0){
		$skor[378] = 0;
	}else{
		$skor[378] = (4-4*(75-$nk2)/75)*100;
	}

	$nk3 = (4*$nilai[39][379]+3*$nilai[40][379]+2*$nilai[41][379]+1*$nilai[42][379])/(3*$nilai[43][379]);
	if($nk3 >= 6){
		$skor[379] = 4;
	}elseif($nk3 == 0){
		$skor[379] = 0;
	}else{
		$skor[379] = 4-4*(6-$nk3)/6;
	}
	$nilaiB = $skor;
	return $nilaiB;

}