<?php 
$arr = [-4,3,-9,0,4,1];

function plusMinus($nomor){
    $positive_number = 0;
    $negative_number = 0;
    $zero_number = 0;

    for ($i=0; $i < count($nomor); $i++) { 
        if ($nomor[$i] > 0) {
            $positive_number++;
        }elseif ($nomor[$i] < 0) {
            $negative_number++;
        }elseif ($nomor[$i] == 0) {
            $zero_number++;
        }
    }

    return number_format($positive_number/count($nomor),6)."<br>".number_format($negative_number/count($nomor), 6)."<br>".number_format($zero_number/count($nomor), 6);
}

echo plusMinus($arr);