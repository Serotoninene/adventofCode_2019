<?php

// PARTIE 1
// Le pattern de chaque ligne se répètent à l'infini
$data = preg_split("/\n/", file_get_contents('data.txt'));

// On part de l'index 0 de la première ligne et on à chaque tour on descend d'une ligne et on ajoute 3

/*$index = 0;
$count = 0;

for ($i = 0; $i < sizeof($data); $i++){
    $data[$i] = str_repeat($data[$i], $i);
    if($data[$i][$index] === "#" ){
        $count += 1;
    }
    $index +=3;
}*/

// PARTIE 2
// Plusieurs pentes à étudier : R1, D1(53); R3, D1 (282); R5, D1(54); R7, D1 (54); R1, D2(22).
function slope ($r,$d){
    $data = preg_split("/\n/", file_get_contents('data.txt'));
    $index = 0;
    $count = 0;
    for ($i = 0; $i < sizeof($data); $i = $i + $d){
        $data[$i] = str_repeat($data[$i], $i);
        var_dump('au tour numéro '.$i.' '.$data[$i][$index]);
        if($data[$i][$index] == "#" ){
            $count += 1;
        }
        $index += $r;
    }

    return $count;
}

echo slope(1,2);
echo slope(1,1)*slope(3,1)*slope(5,1)*slope(7,1)*slope(1,2);





?>