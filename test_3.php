<?php

function timeConversion($time){
    $convert = "";

    $h1 = $time[1];
    $h2 = $time[0];
    $ha = ($h2 * 10 + $h1 % 10);

    if ($time[8] == "A") {
        if ($ha == 12) {
            $convert .= "00";
            for ($i=2; $i <= 7; $i++) { 
                $convert .= $time[$i];
            }
        }else{
            for ($i=0; $i <= 7; $i++) { 
                $convert .= $time[$i];
            }
        }
    }else{
        if ($ha == 12) {
            $convert .= "12";
            for ($i=2; $i <= 7; $i++) { 
                $convert .= $time[$i];
            }
        }else{
            $ha += 12;
            $convert .= $ha;
            for ($i=2; $i <= 7; $i++) { 
                $convert .= $time[$i];
            }
        }
    }

    return $convert;
}

$input = "07:05:45PM";

echo timeConversion($input);