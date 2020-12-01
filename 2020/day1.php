<?php

// PARTIE 1
// Rassembler toutes les données dans un tableau
$data = preg_split("/\n/", file_get_contents('data.txt'));

// Trouver quelles sont les 2 valeurs qui, additionnées, sont égales à 2020
foreach($data as $val){
    for ($i = 0; $i <= sizeof($data); $i++){
        if ($val + $data[$i] === 2020){
//            echo $val."+".$data[$i].'=2020      ';
            $sum = $val * $data[$i];
//            echo $sum."    ";
        }
    };
}

// PARTIE 2
// Trouver quelles sont les 3 valeurs qui, additionnées, sont égales à 2020
foreach($data as $val){
    for ($i = 0; $i <= sizeof($data); $i++){
        for ($j = 0; $j <= sizeof($data); $j++){
            if ($val + $data[$i] + $data[$j] === 2020){
                $sum= $val * $data[$i] * $data[$j];
                echo $sum.'   ';
            }
        }
    };
}

?>