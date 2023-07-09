<?php
use Illuminate\Http\Request;
use App\Models\Lembaga;

if (! function_exists('debugCode')) {
    function debugCode($r=array(),$f=TRUE)
    {
        echo "<pre>";
        print_r($r);
        echo "</pre>";

        if($f==TRUE) 
            die;
    }
}

function getLembaga(){
    $data = Lembaga::get()->all();
    return $data;
}

function hitungNilaiB6($nilai6)
{   
    $nilai6indikatorA = array(
        'a' => 3, 'b' => 2, 'c' => 1, 'brk' => 4
    );
    if($nilai6[4][12] >= 2){
        $yes = 'Yes';
    }else{
        $yes = 'No';
    }

    if($nilai6[4][12] < 2 and $nilai6[5][12] == 6){
        $yes_1 = 'Yes';
    }else{
        $yes_1 = 'No';
    }

    if($nilai6[4][12] > 0 || $nilai6[4][12] < 2 and $nilai6[5][12] == 0){
        $yes_2 = 'Yes';
    }else{
        $yes_2 = 'No';
    }

    if($nilai6[4][12] == 0 and $nilai6[5][12] == 0 and $nilai6[6][12] >= 9){
        $yes_3 = 'Yes';
    }else{
        $yes_3 = 'No';
    }

    if($nilai6[4][12] == 0 and $nilai6[5][12] == 0 and $nilai6[6][12] < 9){
        $yes_4 = 'Yes';
    }else{
        $yes_4 = 'No';
    }

    $nilai6indikatorB = array(
        'a' => 2, 'b' => 6, 'c' => 9, 'd' => $yes, 'e' => $yes_1, 'f' => $yes_2, 'g' => $yes_3, 'h' => $yes_4
    );
    
    
    if($nilai6[3] > 0){
        $hitungan6 = number_format(($nilai6indikatorA['a']*$nilai6[0][11]+$nilai6indikatorA['b']*$nilai6[1][11]+$nilai6indikatorA['c']*$nilai6[2][11])/$nilai6[3][11],2);
    }else{
        $hitungan6 = 0;
    }
    if($hitungan6 >= $nilai6indikatorA['brk']){ 
        $skorA6 = 4; 
    }else{ 
        $skorA6 = $hitungan6; 
    }
    $skorA6 = $skorA6;

    if($nilai6indikatorB['d'] == 'Yes'){
        $skorB6 = 4;
    }elseif($nilai6indikatorB['e'] == 'Yes'){
        $skorB6 = 3+$nilai6[4][12]/2;
    }elseif($nilai6indikatorB['f'] == 'Yes'){
        $skorB6 = 2+2*$nilai6[4][12]/2+$nilai6[5]/6-($nilai6[4][12] * $nilai6[5][12])/(6*9);
    }elseif($nilai6indikatorB['g'] == 'Yes'){
        $skorB6 = 2;
    }else{
        $skorB6 = 2*$nilai6[6][12]/9;
    }
    $skorB6 = $skorB6;

    $nilaiB[6] = ((2*$skorA6) + $skorB6) /3 ;
    return $nilaiB[6];
}

function hitungNilaiB14($nilai14){
    if($nilai14[0][22] >= 12){
        $skorB14[22] = 4;
    }elseif($nilai14[0][22] >= 3){
        $skorB14[22] = number_format(2/(12-3)*($nilai14[0][22]-3)+2,2);
    }else{
        $skorB14[22] = 0;
    }

    if($nilai14[2][23] > 0){
        $skorB14A[23] = $nilai14[1][23]/$nilai14[2][23];
    }else{
        $skorB14A[23] = 0;
    }

    if($skorB14A[23] >= 50){
        $skorB14[23] = 4;
    }else{
        $skorB14[23] = 2+2/50*$skorB14A[23];
    }

    if($nilai14[6][24] > 0){
        $skorB14B[24] = ($nilai14[3][24]+$nilai14[4][24]+$nilai14[5][24])/$nilai14[6][24];
    }else{
        $skorB14B[24] = 0;
    }

    if($skorB14B[24] >= 70){
        $skorB14[24] = 4;
    }else{
        $skorB14[24] = 2+2/70*$skorB14B[24];
    }

    $skorsaintekA = array(
        'b1' => 15, 'b2' => 25, 'b3' => 35
    );
    $skorsoshumA = array(
        'b1' => 25, 'b2' => 35, 'b3' => 50
    );

    if($nilai14[8][25] > 0){
        $skorB14C[25] = $nilai14[7][25]/$nilai14[8][25];
    }else{
        $skorB14C[25] = 0;
    }
    $pilihprodi = 'saintek;';
    $jmlkebutuhan = 'tinggi';
    if($skorB14C[25] > $skorsaintekA['b3']){
        $skorsaintek = 0;
    }elseif($skorB14C[25] > $skorsaintekA['b2']){
        $skorsaintek = -4/($skorsaintekA['b3']-$skorsaintekA['b2'])*($skorB14C[25] - $skorsaintekA['b2'])+4;
    }elseif($skorB14C[25] >= $skorsaintekA['b1']){
        $skorsaintek = 4;
    }else{
        $skorsaintek = 4/$skorsaintekA['b1'] * $skorB14C[25];
    }

    if($skorB14C[25] > $skorsoshumA['b3']){
        $skorsoshum = 0;
    }elseif($skorB14C[25] > $skorsoshumA['b2']){
        $skorsoshum = -4/($skorsoshumA['b3']-$skorsoshumA['b2'])*($skorB14C[25] - $skorsoshumA['b2'])+4;
    }elseif($skorB14C[25] >= $skorsoshumA['b1']){
        $skorsoshum = 4;
    }else{
        $skorsoshum = 4/$skorsoshumA['b1'] * $skorB14C[25];
    }
    if($jmlkebutuhan == 'tinggi'){
        if($pilihprodi == 'saintek;'){
            $skorB14[25] = number_format($skorsaintek,2);
        }else{
            $skorB14[25] = number_format($skorsoshum,2);
        }
    }else{
        $skorB14[25] = $nilaiB[11];
    }

    $skorB14D = ($nilai14[9][26]+$nilai14[10][26])/2;
    if($skorB14D == 0 || $skorB14D > 10){
        $skorB14[26] = 0;
    }elseif($skorB14D > 6){
        $skorB14[26] = -2/(10-6)*($skorB14D-6)+4;
    }else{
        $skorB14[26] = 4;
    }

    if($nilai14[12][27] > 18){
        $skorB14[27] = 0;
    }elseif($nilai14[12][27] >= 16){
        $skorB14[27] = -4/(18-16)*($nilai14[12][27]-16)+4;
    }elseif($nilai14[12][27] >= 12){
        $skorB14[27] = 4;
    }elseif($nilai14[12][27] >= 6){
        $skorB14[27] = 4/(12-6)*($nilai14[12][27]-6);
    }else{
        $skorB14[27] = 0;
    }

    if(($nilai14[13][28]+$nilai14[14][28] > 0) ){
        $skorB14E = $nilai14[13][28]/($nilai14[13][28]+$nilai14[14][28]);
    }else{
        $skorB14E = 0;
    }

    if($skorB14E > 40){
        $skorB14[28] = 0;
    }elseif($skorB14E > 10){
        $skorB14[28] = -2/(40-10)*($skorB14E-10)+4;
    }else{
        $skorB14[28] = 4;
    }

    return $skorB14;
}

function hitungNilaiB15($nilai15){


    if($nilai15[1][29] > 0){
        $skorB15A = $nilai15[0][29] / $nilai15[1][29];
    }else{
        $skorB15A = 0;
    }

    if($skorB15A >= 0.50){
        $skorB15[29] = 4;
    }else{
        $skorB15[29] = number_format(2+2/0.50*$skorB15A,2);
    }

    if($nilai15[5][30] > 0){
        $ri = number_format($nilai15[2][30]/3/$nilai15[5][30],2);
    }else{
        $ri = 0;
    }

    if($nilai15[5][30] > 0){
        $rn = number_format($nilai15[3][30]/3/$nilai15[5][30],2);
    }else{
        $rn = 0;
    }

    if($nilai15[5][30] > 0){
        $rl = number_format($nilai15[4][30]/3/$nilai15[5][30],2);
    }else{
        $rl = 0;
    }

    if($ri >= 0.05){
        $yes15 = 'Yes';
    }else{
        $yes15 = 'No';
    }
    if($ri < 0.05 AND $rn >= 0.30){
        $yes15A = 'Yes';
    }else{
        $yes15A = 'No';
    }

    if($ri > 0 || $ri < 0.05 || $rn == 0 || $rn > 0 || $rn < 0.30 || $ri == 0 ){
        $yes15B = 'Yes';
    }else{
        $yes15B = 'No';
    }

    if($ri == 0 AND $rn == 0 AND $rl >= 1){
        $yes15C = 'Yes';
    }else{
        $yes15C = 'No';
    }

    if($ri == 0 AND $rn == 0 AND $rl < 1){
        $yes15D = 'Yes';
    }else{
        $yes15D = 'No';
    }

    if($yes15 == 'Yes'){
        $skorB15[30] = 4;
    }elseif($yes15A == 'Yes'){
        $skorB15[30] = 3+$ri/0.05;
    }elseif($yes15B == 'Yes'){
        $skorB15[30] = 2+2*$ri/0.05+$rn/0.30-($ri*$rn)/(0.05*0.30);
    }elseif($yes15C == 'Yes'){
        $skorB15[30] = 2;
    }else{
        $skorB15[30] = 2*$rl/1;
    }

    if($nilai15[9][31] > 0){
        $ri31 = number_format($nilai15[6][31]/3/$nilai15[9][31],2);
    }else{
        $ri31 = 0;
    }

    if($nilai15[9][31] > 0){
        $rn31 = number_format($nilai15[7][31]/3/$nilai15[9][31],2);
    }else{
        $rn31 = 0;
    }

    if($nilai15[9][31] > 0){
        $rl31 = number_format($nilai15[8][31]/3/$nilai15[9][31],2);
    }else{
        $rl31 = 0;
    }

    if($ri31 >= 0.05){
        $yes31 = 'Yes';
    }else{
        $yes31 = 'No';
    }
    if($ri31 < 0.05 AND $rn31 >= 0.30){
        $yes31A = 'Yes';
    }else{
        $yes31A = 'No';
    }

    if($ri31 > 0 || $ri31 < 0.05 AND $rn31 == 0 AND $rn31 > 0 AND $rn31 < 0.30 AND $ri31 == 0 ){
        $yes31B = 'Yes';
    }else{
        $yes31B = 'No';
    }

    if($ri31 == 0 AND $rn31 == 0 AND $rl31 >= 1){
        $yes31C = 'Yes';
    }else{
        $yes31C = 'No';
    }

    if($ri31 == 0 AND $rn31 == 0 AND $rl31 < 1){
        $yes31D = 'Yes';
    }else{
        $yes31D = 'No';
    }
    
    if($yes31 == 'Yes'){
        $skorB15[31] = 4;
    }elseif($yes31A == 'Yes'){
        $skorB15[31] = 3+$ri31/0.05;
    }elseif($yes31B == 'Yes'){
        $skorB15[31] = 2+2*$ri31/0.05+$rn31/0.30-($ri31*$rn31)/(0.05*0.30);
    }elseif($yes31C == 'Yes'){
        $skorB15[31] = 2;
    }else{
        $skorB15[31] = 2*$rl31/1;
    }

    if($nilai15[20][32] > 0){
        $ri32 = number_format(($nilai15[13][32]+$nilai15[16][32]+$nilai15[19][32])/$nilai15[20][32],2);
    }else{
        $ri32 = 0;
    }
    
    if($nilai15[20][32] > 0){
        $rn32 = number_format(($nilai15[11][32]+$nilai15[12][32]+$nilai15[15][32]+$nilai15[18][32])/$nilai15[20][32],2);
    }else{
        $rn32 = 0;
    }
    
    if($nilai15[20][32] > 0){
        $rl32 = number_format(($nilai15[14][32]+$nilai15[17][32]+$nilai15[10][32])/$nilai15[20][32],2);
    }else{
        $rl32 = 0;
    }

    if($ri32 >= 0.10){
        $yes32 = 'Yes';
    }else{
        $yes32 = 'No';
    }
    if($ri32 < 0.10 AND $rn32 >= 1){
        $yes32A = 'Yes';
    }else{
        $yes32A = 'No';
    }

    if($ri32 > 0 || $ri32 < 0.10 AND $rn32 == 0 AND $rn32 > 0 AND $rn32 < 1 AND $ri32 == 0 ){
        $yes32B = 'Yes';
    }else{
        $yes32B = 'No';
    }

    if($ri32 == 0 AND $rn32 == 0 AND $rl32 >= 2){
        $yes32C = 'Yes';
    }else{
        $yes32C = 'No';
    }

    if($ri32 == 0 AND $rn32 == 0 AND $rl32 < 2){
        $yes32D = 'Yes';
    }else{
        $yes32D = 'No';
    }

    if($yes32 == 'Yes'){
        $skorB15[32] = 4;
    }elseif($yes32A == 'Yes'){
        $skorB15[32] = 3+$ri32/0.10;
    }elseif($yes32B == 'Yes'){
        $skorB15[32] = 2+2*$ri32/0.10+$rn32/1-($ri32*$rn32)/(0.10*1);
    }elseif($yes32C == 'Yes'){
        $skorB15[32] = 2;
    }else{
        $skorB15[32] = 2*$rl32/2;
    }

    if($nilai15[22][33] > 0){
        $skorB15B = $nilai15[21][33] / $nilai15[22][33];
    }else{
        $skorB15B = 0;
    }
    if($skorB15B > 0.5){
        $skorB15[33] = 4;
    }else{
        $skorB15[33] = number_format(2+2/0.5*$skorB15B,2);
    }

    if($nilai15[27][34] > 0){
        $skorB15C = (2*($nilai15[23][34]+$nilai15[24][34]+$nilai15[25][34])+$nilai15[26][34])/$nilai15[27][34];
    }else{
        $skorB15C = 0;
    }
    if($skorB15C > 1){
        $skorB15[34] = 4;
    }else{
        $skorB15[34] = number_format(2+2/1*$skorB15C,2);
    }
    return $skorB15;
}

function hitungNilaiB18($nilai18){
    if($nilai18[1][38] > 0){
        $skorB38A = ($nilai18[0][38]/2/$nilai18[1][38]) * 3/3;
    }else{
        $skorB38A = 0;
    }
    if($skorB38A >= 20000000){
        $skorB18[38] = 4;
    }else{
        $skorB18[38] = number_format(4/20000000*$skorB38A,2);
    }

    if($nilai18[3][39] > 0){
        $skorB38B = ($nilai18[2][39]/3/$nilai18[3][39]) * 3/3;
    }else{
        $skorB38B = 0;
    }
    if($skorB38B >= 10000000){
        $skorB18[39] = 4;
    }else{
        $skorB18[39] = number_format(4/10000000*$skorB38B,2);
    }

    if($nilai18[5][40] > 0){
        $skorB38C = ($nilai18[4][40]/3/$nilai18[5][40]) * 3/3;
    }else{
        $skorB38C = 0;
    }
    if($skorB38C >= 5000000){
        $skorB18[40] = 4;
    }else{
        $skorB18[40] = number_format(4/5000000*$skorB38C,2);
    }

    return $skorB18;
}

function hitungNilaiB23($nilai23){
    if($nilai23[6][55] > 0){
        $skorB23 = number_format($nilai23[5][55] / $nilai23[6][55] *100);
    }else{
        $skorB23 = 0;
    }
    if($skorB23 > 20){
        $nilaiB[55] = 4;
    }else{
        $nilaiB[55] = 4/20*$skorB23;
    }

    return $nilaiB;
}

function hitungNilaiB28($nilai28){
    
    if(((4*$nilai28[0][63]+3*$nilai28[1][63]+2*$nilai28[2][63]+$nilai28[3][63])/4) > 100  ){
        $tkm1 = 0;
    }else{
        $tkm1 = (4*$nilai28[0][63]+3*$nilai28[1][63]+2*$nilai28[2][63]+$nilai28[3][63])/4 * 100;
    }

    if(((4*$nilai28[4][63]+3*$nilai28[5][63]+2*$nilai28[6][63]+$nilai28[7][63])/4) > 100  ){
        $tkm2 = 0;
    }else{
        $tkm2 = (4*$nilai28[4][63]+3*$nilai28[5][63]+2*$nilai28[6][63]+$nilai28[7][63])/4 * 100;
    }

    if(((4*$nilai28[8][63]+3*$nilai28[9][63]+2*$nilai28[10][63]+$nilai28[11][63])/4) > 100  ){
        $tkm3 = 0;
    }else{
        $tkm3 = number_format((4*$nilai28[8][63]+3*$nilai28[9][63]+2*$nilai28[10][63]+$nilai28[11][63])/4 * 100,1);
    }

    if(((4*$nilai28[12][63]+3*$nilai28[13][63]+2*$nilai28[14][63]+$nilai28[15][63])/4) > 100  ){
        $tkm4 = 0;
    }else{
        $tkm4 = (4*$nilai28[12][63]+3*$nilai28[13][63]+2*$nilai28[14][63]+$nilai28[15][63])/4 * 100;
    }

    if(((4*$nilai28[16][63]+3*$nilai28[17][63]+2*$nilai28[18][63]+$nilai28[19][63])/4) > 100  ){
        $tkm5 = 0;
    }else{
        $tkm5 = number_format((4*$nilai28[16][63]+3*$nilai28[17][63]+2*$nilai28[18][63]+$nilai28[19][63])/4 * 100,1);
    }
    $tkm = ($tkm1+$tkm2+$tkm3+$tkm4+$tkm5)/5;

    if($tkm > 75){
        $nilai28A[63] = 4;
    }elseif($tkm >= 25){
        $nilai28A[63] = 4/(75-25)*($tkm-25);
    }else{
        $nilai28A[63] = 0;
    }

    return $nilai28A;
}

function hitungNilaiB30($nilai30){
    //debugCode($nilai30[1][66]);
    if($nilai30[1][66] > 0){
        $skor30 = $nilai30[0][66] / $nilai30[1][66] * 100;
    }else{
        $skor30 = 0;
    }
    if($skor30 > 25){
        $nilaiB[66] = 4;
    }else{
        $nilaiB[66] = number_format(2+2/25*$skor30,2);
    }

    return $nilaiB;
}

function hitungNilaiB32($nilai32){
    if($nilai32[1][68] > 0){
        $skor30 = $nilai32[0][68] / $nilai32[1][68] * 100;
    }else{
        $skor30 = 0;
    }
    if($skor30 > 25){
        $nilaiB[68] = 4;
    }else{
        $nilaiB[68] = number_format(2+2/25*$skor30,2);
    }

    return $nilaiB;
}

function hitungNilaiB33($nilai33){

    if(($nilai33[0][70]+$nilai33[1][70]+$nilai33[2][70]) > 0){
        $skor33A = ($nilai33[0][70]*$nilai33[3][70]+$nilai33[1][70]*$nilai33[4][70]+$nilai33[2][70]*$nilai33[5][70])/($nilai33[0][70]+$nilai33[1][70]+$nilai33[2][70]);
    }else{
        $skor33A = 0;
    }
    if($skor33A >= 3.25){
        $skor33[70] = 4;
    }elseif($skor33A >= 2){
        $skor33[70] = 2/(3.25-2)*($skor33A-2)+2;
    }else{
        $skor33[70] = 0;
    }

    if($nilai33[9][71] > 0){
        $ri33 = $nilai33[6][71] / $nilai33[9][71] * 100;
    }else{
        $ri33 = 0;
    } 

    if($nilai33[9][71] > 0){
        $rn33 = $nilai33[7][71] / $nilai33[9][71] * 100;
    }else{
        $rn33 = 0;
    }
    if($nilai33[9][71] > 0){
        $rw33 = $nilai33[8][71] / $nilai33[9][71] * 100;
    }else{
        $rw33 = 0;
    } 

    if($ri33 >= 0.10){
        $yes33 = 'Yes';
    }else{
        $yes33 = 'No';
    }
    if($ri33 < 0.10 AND $rn33 >= 1){
        $yes33A = 'Yes';
    }else{
        $yes33A = 'No';
    }

    if($ri33 > 0 || $ri33 < 0.10 AND $rn33 == 0 AND $rn33 > 0 AND $rn33 < 1 AND $ri33 == 0 ){
        $yes33B = 'Yes';
    }else{
        $yes33B = 'No';
    }

    if($ri33 == 0 AND $rn33 == 0 AND $rw33 >= 2){
        $yes33C = 'Yes';
    }else{
        $yes33C = 'No';
    }

    if($ri33 == 0 AND $rn33 == 0 AND $rw33 < 2){
        $yes33D = 'Yes';
    }else{
        $yes33D = 'No';
    }

    if($yes33 == 'Yes'){
        $skor33[71] = 4;
    }elseif($yes33A == 'Yes'){
        $skor33[71] = 3+$ri33/0.10;
    }elseif($yes33B == 'Yes'){
        $skor33[71] = 2+2*$ri33/0.10+$rn33/1-($ri33*$rn33)/(0.10*1);
    }elseif($yes33C == 'Yes'){
        $skor33[71] = 2;
    }else{
        $skor33[71] = 2*$rw33/2;
    }

    if($nilai33[13][72] > 0){
        $ri72 = $nilai33[10][72] / $nilai33[13][72] * 100;
    }else{
        $ri72 = 0;
    } 

    if($nilai33[13][72] > 0){
        $rn72 = $nilai33[11][72] / $nilai33[13][72] * 100;
    }else{
        $rn72 = 0;
    }
    if($nilai33[13][72] > 0){
        $rw72 = $nilai33[12][72] / $nilai33[13][72] * 100;
    }else{
        $rw72 = 0;
    } 

    if($ri72 >= 0.20){
        $yes72 = 'Yes';
    }else{
        $yes72 = 'No';
    }
    if($ri72 < 0.20 AND $rn72 >= 2){
        $yes72A = 'Yes';
    }else{
        $yes72A = 'No';
    }

    if($ri72 > 0 || $ri72 < 0.20 AND $rn72 == 0 AND $rn72 > 0 AND $rn72 < 2 AND $ri72 == 0 ){
        $yes72B = 'Yes';
    }else{
        $yes72B = 'No';
    }

    if($ri72 == 0 AND $rn72 == 0 AND $rw72 >= 4){
        $yes72C = 'Yes';
    }else{
        $yes72C = 'No';
    }

    if($ri72 == 0 AND $rn72 == 0 AND $rw72 < 4){
        $yes72D = 'Yes';
    }else{
        $yes72D = 'No';
    }

    if($yes72 == 'Yes'){
        $skor33[72] = 4;
    }elseif($yes72A == 'Yes'){
        $skor33[72] = number_format(3+$ri72/0.20,2);
    }elseif($yes72B == 'Yes'){
        $skor33[72] = number_format(2+2*$ri72/0.20+$rn72/2-($ri72*$rn72)/(0.20*2),2);
    }elseif($yes72C == 'Yes'){
        $skor33[72] = 2;
    }else{
        $skor33[72] = number_format(2*$rw72/4,2);
    }

    if(($nilai33[14][73]+$nilai33[16][73]+$nilai33[18][73]+$nilai33[20][73]) > 0){
        $skor73 = ($nilai33[14][73]*$nilai33[15][73]+$nilai33[16][73]*$nilai33[17][73]+$nilai33[18][73]*$nilai33[19][73]+$nilai33[20][73]*$nilai33[21][73])/($nilai33[14][73]+$nilai33[16][73]+$nilai33[18][73]+$nilai33[20][73]) * 100;
    }else{
        $skor73 = 0;
    }
    if($skor73 > 7){
        $skor33[73] = 0;
    }elseif($skor73 > 4.5){
        $skor33[73] = -4/(7-4.5)*($skor73-4.5)+4;
    }elseif($skor73 > 3){
        $skor33[73] = 4;
    }elseif($skor73 > 3.5){
        $skor33[73] = 4/(3.5-4.5)*($skor73-3.5);
    }else{
        $skor33[73] = 0;
    }

    if(($nilai33[22][74]+$nilai33[23][74]+$nilai33[24][74]+$nilai33[25][74]) > 0){
        $skor74 = ($nilai33[26][74]+$nilai33[27][74]+$nilai33[28][74]+$nilai33[29][74]) / ($nilai33[22][74]+$nilai33[23][74]+$nilai33[24][74]+$nilai33[25][74]) * 100;
    }else{
        $skor74 = 0;
    }
    if($skor74 >= 50){
        $skor33[74] = 4;
    }else{
         $skor33[74] = 1+3/50*$skor74;
    }

    if($nilai33[30][75] > 0){
        $skor75 = ($nilai33[31][75]+$nilai33[32][75]+$nilai33[33][75]+$nilai33[34][75])/$nilai33[30][75];
    }else{
        $skor75 = 0;
    }
    if($skor75 >= 85){
        $skor33[75] = 4;
    }elseif($skor75 >= 30){
        $skor33[75] = 4/(85-30)*($skor75-30);
    }else{
         $skor33[75] = 0;
    }
    $sumAll = 0;
    $sumAll78 = 0;
    $sumAll79 = 0;
    foreach ($nilai33 as $key => $value) {
        foreach($value as $keys => $values){
            if($keys == 77){
                $sumAll += $values;
            }
            if($keys == 78){
                $sumAll78 += $values;
            }
            if($keys == 79){
                $sumAll79 += $values;
            }
        }
    }
    if($sumAll > 0){
        $wt = (($nilai33[35][77]+$nilai33[38][77]+$nilai33[41][77])*1.5+($nilai33[36][77]+$nilai33[39][77]+$nilai33[42][77])*4.5+($nilai33[37][77]+$nilai33[40][77]+$nilai33[43][77])*9)/$sumAll;
    }else{
        $wt = 0;
    }

    if($wt >= 6){
        $sa = 0;
    }elseif($wt > 3){
        $sa = -4/(6-3)*($wt-3)+4;
    }else{
        $sa = 4;
    }
    if(0 > 50 ){
        $skor33[77] = $sa;
    }else{
        $skor33[77] = 0/50*$sa;
    }

    if($sumAll78 > 0){
        $pbs = (($nilai33[44][78]+$nilai33[47][78]+$nilai33[50][78])*30+($nilai33[45][78]+$nilai33[48][78]+$nilai33[51][78])*70+($nilai33[46][78]+$nilai33[49][78]+$nilai33[52][78])*100)/$sumAll78;
    }else{
        $pbs = 0;
    }
    if($pbs >= 80){
        $sa78 = 4;
    }else{
        $sa78 = 5*$pbs;
    }
    if(0 > 50){
        $skor33[78] = $sa78;
    }else{
        $skor33[78] = 0/50*$sa78;
    }

    if($sumAll79 > 0){
        $ri79 = ($nilai33[53][79]+$nilai33[56][79]+$nilai33[59][79])/$sumAll79;
        $rn79 = ($nilai33[54][79]+$nilai33[57][79]+$nilai33[60][79])/$sumAll79;
        $rw79 = ($nilai33[55][79]+$nilai33[58][79]+$nilai33[61][79])/$sumAll79;
    }else{
        $ri79 = 0;
        $rn79 = 0;
        $rw79 = 0;
    }

    if($ri79 >= 5){
        $yes79 = 'Yes';
    }else{
        $yes79 = 'No';
    }
    if($ri79 < 5 AND $rn79 >= 20){
        $yes79A = 'Yes';
    }else{
        $yes79A = 'No';
    }

    if($ri79 > 0 || $ri79 < 5 AND $rn79 == 0 AND $rn79 > 0 AND $rn79 < 20 AND $ri79 == 0 ){
        $yes79B = 'Yes';
    }else{
        $yes79B = 'No';
    }

    if($ri79 == 0 AND $rn79 == 0 AND $rw79 >= 90){
        $yes79C = 'Yes';
    }else{
        $yes79C = 'No';
    }

    if($ri79 == 0 AND $rn79 == 0 AND $rw79 < 90){
        $yes79D = 'Yes';
    }else{
        $yes79D = 'No';
    }

    if($yes79 == 'Yes'){
        $sa79 = 4;
    }elseif($yes79A == 'Yes'){
        $sa79 = number_format(3+$ri79/5,2);
    }elseif($yes79B == 'Yes'){
        $sa79 = number_format(2+2*$ri79/5+$rn79/2-($ri79*$rn79)/(5*2),2);
    }elseif($yes79C == 'Yes'){
        $sa79 = 2;
    }else{
        $sa79 = number_format(2*$rw79/4,2);
    }
    if(0 > 50){
        $skor33[79] = $sa79;
    }else{
        $skor33[79] = 0/50*$sa79;
    }

    if((4*$nilai33[62][80]+3*$nilai33[63][80]+2*$nilai33[64][80]+$nilai33[65][80]) > 4){
        $tk1 = 0;
    }else{
        $tk1 = 4*$nilai33[62][80]+3*$nilai33[63][80]+2*$nilai33[64][80]+$nilai33[65][80];
    }
    if((4*$nilai33[66][80]+3*$nilai33[67][80]+2*$nilai33[68][80]+$nilai33[69][80]) > 4){
        $tk2 = 0;
    }else{
        $tk2 = 4*$nilai33[66][80]+3*$nilai33[67][80]+2*$nilai33[68][80]+$nilai33[69][80];
    }
    if((4*$nilai33[70][80]+3*$nilai33[71][80]+2*$nilai33[72][80]+$nilai33[73][80]) > 4){
        $tk3 = 0;
    }else{
        $tk3 = 4*$nilai33[70][80]+3*$nilai33[71][80]+2*$nilai33[72][80]+$nilai33[73][80];
    }
    if((4*$nilai33[74][80]+3*$nilai33[75][80]+2*$nilai33[76][80]+$nilai33[77][80]) > 4){
        $tk4 = 0;
    }else{
        $tk4 = 4*$nilai33[74][80]+3*$nilai33[75][80]+2*$nilai33[76][80]+$nilai33[77][80];
    }
    if((4*$nilai33[78][80]+3*$nilai33[79][80]+2*$nilai33[80][80]+$nilai33[81][80]) > 4){
        $tk5 = 0;
    }else{
        $tk5 = 4*$nilai33[78][80]+3*$nilai33[79][80]+2*$nilai33[80][80]+$nilai33[81][80];
    }
    if((4*$nilai33[82][80]+3*$nilai33[83][80]+2*$nilai33[84][80]+$nilai33[85][80]) > 4){
        $tk6 = 0;
    }else{
        $tk6 = 4*$nilai33[82][80]+3*$nilai33[83][80]+2*$nilai33[84][80]+$nilai33[85][80];
    }
    if((4*$nilai33[86][80]+3*$nilai33[87][80]+2*$nilai33[88][80]+$nilai33[89][80]) > 4){
        $tk7 = 0;
    }else{
        $tk7 = 4*$nilai33[86][80]+3*$nilai33[87][80]+2*$nilai33[88][80]+$nilai33[89][80];
    }
    $sa80 = ($tk1+$tk2+$tk3+$tk4+$tk5+$tk6+$tk7)/7;
    if(0 > 50){
        $skor33[80] = $sa80;
    }else{
        $skor33[80] = 0/50*$sa80;
    }

    return $skor33;
}

function hitungNilaiB34($nilai34){
    if($nilai34[10][81] > 0){
        $ri = ($nilai34[3][81]+$nilai34[6][81]+$nilai34[9][81])/$nilai34[10][81];
    }else{
        $ri = 0;
    }

    if($nilai34[10][81] > 0){
        $rn = ($nilai34[1][81]+$nilai34[2][81]+$nilai34[5][81]+$nilai34[8][81])/$nilai34[10][81];
    }else{
        $rn = 0;
    }

    if($nilai34[10][81] > 0){
        $rw = ($nilai34[0][81]+$nilai34[4][81]+$nilai34[7][81])/$nilai34[10][81];
    }else{
        $rw = 0;
    }

    if($ri >= 1){
        $yes = 'Yes';
    }else{
        $yes = 'No';
    }
    if($ri < 1 AND $rn >= 10){
        $yesA = 'Yes';
    }else{
        $yesA = 'No';
    }

    if($ri > 0 || $ri < 1 AND $rn == 0 AND $rn > 0 AND $rn < 10 AND $ri == 0 ){
        $yesB = 'Yes';
    }else{
        $yesB = 'No';
    }

    if($ri == 0 AND $rn == 0 AND $rw >= 50){
        $yesC = 'Yes';
    }else{
        $yesC = 'No';
    }

    if($ri == 0 AND $rn == 0 AND $rw < 50){
        $yesD = 'Yes';
    }else{
        $yesD = 'No';
    }

    if($yes == 'Yes'){
        $skor33[81] = 4;
    }elseif($yesA == 'Yes'){
        $skor33[81] = number_format(3+$ri/1,2);
    }elseif($yesB == 'Yes'){
        $skor33[81] = number_format(2+2*$ri/1+$rn/10-($ri*$rn)/(1*10),2);
    }elseif($yesC == 'Yes'){
        $skor33[81] = 2;
    }else{
        $skor33[81] = number_format(2*$rw/50,2);
    }

    $nlp = 2*($nilai34[11][82]+$nilai34[12][82]+$nilai34[13][82])+$nilai34[14][82];
    if($nlp >= 1){
        $skor33[82] = 4;
    }else{
        $skor33[82] = 2+2/1*$nlp;
    }

    return $skor33;
}