<?php
$arr = [1,2,3,4,5];

function minMaxSum($nomor){
    sort($nomor);
    $max_number = 0;
    $min_number = 0;
    for ($i=0; $i < count($nomor) - 1; $i++) { 
        $min_number += $nomor[$i];
    }
    for ($i=1; $i < count($nomor); $i++) { 
        $max_number += $nomor[$i];
    }

    return $min_number.' '.$max_number;
}

echo minMaxSum($arr);