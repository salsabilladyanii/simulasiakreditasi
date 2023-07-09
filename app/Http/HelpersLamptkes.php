<?php
use Illuminate\Http\Request;
use App\Models\Lembaga;

function hitungNilai119($nilai)
{	

	$skor[272] = ((4*$nilai[0][272])+(3*$nilai[1][272])+(2*$nilai[2][272])+(1*$nilai[3][272])+(0*$nilai[4][272]))/$nilai[5][272];

	$n = $nilai[6][273]+$nilai[7][273]+$nilai[8][273]+$nilai[9][273]+$nilai[10][273];
	$skor[273] = ((4*$nilai[6][273])+(3*$nilai[7][273])+(2*$nilai[8][273])+(0*$nilai[9][273])+(1*$nilai[10][273]))/$n;

	$nilaiB = $skor;
	return $nilaiB;

}

function hitungNilai122($nilai)
{	
	$rasio = $nilai[0][282]/$nilai[1][282];

	if($rasio >= 5){
		$skor[282] = 4;
	}elseif(2 < $rasio AND $rasio < 5){
		$skor[282] = 4*($rasio - 2)/3;
	}else{
		$skor[282] = 0;
	}

	if(1 < $nilai[2][412] AND $nilai[2][412] <= 5){
		$skor[412] = 4;
	}elseif($nilai[2][412] <= 1){
		$skor[412] = 2+(200*$nilai[2][412]);
	}elseif(5 < $nilai[2][412] AND $nilai[2][412] <= 10){
		$skor[412] = 6-(40*$nilai[2][412]);
	}else{
		$skor[412] = 0;
	}

	$rm = $nilai[3][413]/$nilai[4][413];

	if(0.18 < $rm AND $rm <= 0.22){
		$skor[413] = 4;
	}elseif(0.08 < $rm AND $rm <= 0.18){
		$skor[413] = (40*$rm)-(16/5);
	}elseif(0.22 < $rm AND $rm <= 0.40){
		$skor[413] = (80-200*$rm)/9;
	}elseif($rm <= 0.08 and $rm >= 0.40){
		$skor[413] = 0;
	}else{
		$skor[413] = 0;
	}

	$sum = $nilai[5][414]+$nilai[6][414]+$nilai[7][414]+$nilai[8][414];
	$skor[414] = ((4*$nilai[5][414])+(3*$nilai[6][414])+(2*$nilai[7][414])+$nilai[8][414])/$sum;

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai138($nilai)
{	
	if($nilai[0][418] >= 30){
		$skor[418] = 4;
	}elseif(0 < $nilai[0][418] AND $nilai[0][418] < 30){
		$skor[418] = 1+(10*$nilai[0][418]);
	}else{
		$skor[418] = 0;
	}

	if($nilai[1][419] >= 30){
		$skor[419] = 4;
	}else{
		$skor[419] = 2+(10*$nilai[1][419])/3;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai139($nilai)
{	
	if($nilai[0][420] >= 30){
		$skor[420] = 4;
	}elseif(0 < $nilai[0][420] AND $nilai[0][420] < 30){
		$skor[420] = 1+(10*$nilai[0][420]);
	}else{
		$skor[420] = 0;
	}

	if($nilai[1][421] >= 30){
		$skor[421] = 4;
	}else{
		$skor[421] = 2+(10*$nilai[1][421])/3;
	}

	if($nilai[2][422] >= 40){
		$skor[422] = 4;
	}else{
		$skor[422] = 10*$nilai[2][422];
	}

	if($nilai[3][423] >= 90){
		$skor[423] = 4;
	}elseif(10 < $nilai[3][423] AND $nilai[3][423] < 90){
		$skor[423] = (5*$nilai[3][423])-0.5;
	}else{
		$skor[423] = 0;
	}

	if($nilai[4][424] <= 12){
		$skor[424] = 4;
	}elseif(13 <= $nilai[4][424] AND $nilai[4][424] <= 25){
		$skor[424] = 3;
	}elseif(26 <= $nilai[4][424] AND $nilai[4][424] <= 30){
		$skor[424] = 2;
	}elseif(31 <= $nilai[4][424] AND $nilai[4][424] <= 40){
		$skor[424] = 1;
	}else{
		$skor[424] = 0;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai141($nilai)
{
	if(12 <= $nilai[0][425] AND $nilai[0][425] <= 16){
		$skor[425] = 4;
	}elseif(5 < $nilai[0][425] AND $nilai[0][425] < 12){
		$skor[425] = ($nilai[0][425]-3)/2;
	}elseif(16 < $nilai[0][425] AND $nilai[0][425] < 21){
		$skor[425] = (71-3*$nilai[0][425])/8;
	}else{
		$skor[425] = 1;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai142($nilai)
{	
	$sp = ($nilai[0][426]+($nilai[1][426]/4))/$nilai[2][426];

	if($sp >= 2.25){
		$skor[425] = 4;
	}elseif(0 < $sp AND $sp < 2.25){
		$skor[425] = 1+(4* $sp)/3;
	}else{
		$skor[425] = 1;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai143($nilai)
{	
	if($nilai[0][427] <= 10){
		$skor[427] = 4;
	}elseif(10 < $nilai[0][427] AND $nilai[0][427] < 40){
		$skor[427] = (1-$nilai[0][427])/0.3;
	}elseif(40 < $nilai[0][427] AND $nilai[0][427] < 100){
		$skor[427] = (2-(2*$nilai[0][427]))/0.6;
	}else{
		$skor[427] = 0;
	}


	if($nilai[1][428] == 100){
		$skor[428] = 4;
	}elseif(20 < $nilai[1][428] AND $nilai[1][428] < 100){
		$skor[428] = (5*$nilai[1][428])-1;
	}elseif($nilai[1][428] <= 20){
		$skor[428] = 0;
	}else{
		$skor[428] = 0;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai145($nilai)
{	
	$ptn = 'ptn';
	if($ptn = 'ptn'){
		if($nilai[0][432] <= 33){
			$skor[432] = 4;
		}elseif($nilai[0][432] > 33){
			$skor[432] = (334-(200*$nilai[0][432]))/67;
		}else{
			$skor[432] = 1;
		}
	}else{
		if($nilai[0][432] <= 66){
			$skor[432] = 4;
		}elseif($nilai[0][432] > 66){
			$skor[432] = (134-(100*$nilai[0][432]))/17;
		}else{
			$skor[432] = 1;
		}
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai146($nilai)
{	
	if(20 <= $nilai[0][433] AND $nilai[0][433] <= 40 || $nilai[0][433] >= 40 AND $nilai[0][433] <= 33){
		$skor[433] = 4;
	}elseif($nilai[0][433] < 20){
		$skor[433] = $nilai[0][433]/5;
	}elseif(40 < $nilai[0][433] AND $nilai[0][433] < 60){
		$skor[433] = (80-$nilai[0][433])/10;
	}elseif($nilai[0][433] > 60){
		$skor[433] = 2;
	}else{
		$skor[433] = 2;
	}

	if(5 <= $nilai[1][434] AND $nilai[1][434] <= 10){
		$skor[434] = 4;
	}elseif(10 < $nilai[1][434] AND $nilai[1][434] <= 30){
		$skor[434] = 6-(20*$nilai[1][434]);
	}elseif($nilai[1][434] < 5 || $nilai[1][434] > 30){
		$skor[434] = 0;
	}else{
		$skor[434] = 0;
	}

	if($nilai[2][435] >= 10){
		$skor[435] = 4;
	}elseif(0 < $nilai[2][435] AND $nilai[2][435] <= 10){
		$skor[435] = (2*$nilai[2][435])/5;
	}else{
		$skor[435] = 0;
	}

	if($nilai[3][436] >= 5){
		$skor[436] = 4;
	}elseif(0 < $nilai[3][436] AND $nilai[3][436] <= 5){
		$skor[436] = (4*$nilai[3][436])/5;
	}else{
		$skor[436] = 0;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai147($nilai)
{	
	if($nilai[0][437] >= 400){
		$skor[437] = 4;
	}else{
		$skor[437] = $nilai[0][437]/100;
	}

	if($nilai[1][439] == 100){
		$skor[439] = 4;
	}elseif($nilai[1][439] == 0){
		$skor[439] = 4;
	}else{
		$skor[439] = 1+(3*$nilai[1][439]);
	}

	if($nilai[2][440] >= 6){
		$skor[440] = 4;
	}else{
		$skor[440] = (1+$nilai[2][440])/3;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai150($nilai)
{	
	if($nilai[0][448] >= 12){
		$skor[448] = 4;
	}elseif($nilai[0][448] == 0){
		$skor[448] = 0;
	}else{
		$skor[448] = 1+($nilai[0][448]/4);
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai151($nilai)
{	
	if($nilai[0][449] <= 4){
		$skor[449] = 4;
	}elseif($nilai[0][449] == 0 || $nilai[0][449] >= 20){
		$skor[449] = 0;
	}else{
		$skor[449] = 5-($nilai[0][449]/4);
	}

	if($nilai[1][450] >= 8){
		$skor[450] = 4;
	}else{
		$skor[450] = $nilai[1][450]/2;
	}

	if($nilai[2][451] >= 80){
		$skor[451] = 4;
	}else{
		$skor[451] = 2+(5*$nilai[2][451])/2;
	}

	if($nilai[3][452] <= 6){
		$skor[452] = 4;
	}elseif($nilai[3][452] > 6 AND  $nilai[3][452] <= 14){
		$skor[452] = (14-$nilai[3][452])/2;
	}else{
		$skor[452] = 0;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai153($nilai)
{	
	$nkr = (($nilai[3][463]*4)+($nilai[4][463]*2)+($nilai[5][463]*1))/$nilai[6][463];
	$nkl = (($nilai[0][463]*4)+($nilai[1][463]*2)+($nilai[2][463]*1))/$nilai[6][463];
	$nk = ($nkr+$nkl)/2;

	if($nk >= 5){
		$skor[463] = 4;
	}elseif($nk >= 4 AND $nk < 5){
		$skor[463] = 3;
	}elseif($nk >= 3 AND $nk < 4){
		$skor[463] = 2;
	}elseif($nk >= 1 AND $nk < 3){
		$skor[463] = 1;
	}else{
		$skor[463] = 0;
	}

	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai155($nilai)
{	
	$nk = (($nilai[0][466]*4)+($nilai[1][466]*2)+($nilai[2][466]*1))/$nilai[3][466];
	if($nk >= 5){
		$skor[466] = 4;
	}elseif($nk >= 4 AND $nk < 5){
		$skor[466] = 3;
	}elseif($nk >= 3 AND $nk < 4){
		$skor[466] = 2;
	}elseif($nk >= 1 AND $nk < 3){
		$skor[466] = 1;
	}else{
		$skor[466] = 0;
	}
	
	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai157($nilai)
{	
	$pks = (($nilai[1][469]+0.5*$nilai[2][469]+0.5)/$nilai[0][469])*100;
	if($pks >= 95){
		$skor[469] = 4;
	}elseif($pks >= 40 AND $pks < 95){
		$skor[469] = (($pks*300)-65)/55;
	}else{
		$skor[469] = 0;
	}

	$sumNipk = $nilai[4][470]+$nilai[5][470]+$nilai[6][470];
	$nipk = (($nilai[4][470]*2)+($nilai[5][470]*3)+($nilai[6][470]*4))/$sumNipk;

	if($nipk >= 3){
		$skor[470] = 4;
	}elseif($nipk >= 2 AND $nipk < 2){
		$skor[470] = 2*$nipk-2;
	}else{
		$skor[470] = 0;
	}

	$ktw = ($nilai[7][471]/$nilai[8][471])*100;
	if($ktw >= 70 ){
		$skor[471] = 4;
	}elseif($ktw >= 15 AND $ktw < 75){
		$skor[471] = ((80*$KTW)-12)/11;
	}else{
		$skor[471] = 0;
	}

	if($nilai[9][472] <= 3){
		$skor[472] = 4;
	}elseif($nilai[9][472] >= 3 AND $nilai[9][472] < 12){
		$skor[472] = (48-(4*$nilai[9][472]))/9;
	}else{
		$skor[472] = 0;
	}

	$sum473 = $nilai[10][473]+$nilai[11][473]+$nilai[12][473]+$nilai[13][473];
	$skor[473] = ((4*$nilai[10][473])+(3*$nilai[11][473])+(2*$nilai[12][473])+$nilai[13][473])/$sum473;
	
	$nilaiB = $skor;
	return $nilaiB;
}

function hitungNilai158($nilai)
{
	$nk = ((4*$nilai[1][474])+(3*$nilai[2][474])+($nilai[3][474]))/$nilai[0][474];

	if($nk >= 6){
		$skor[474] = 4;
	}elseif($nk > 0 AND $nk < 6){
		$skor[474] = 1+($nk/2);
	}else{
		$skor[474] = 0;
	}

	$nilaiB = $skor;
	return $nilaiB;
}