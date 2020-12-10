<?php

    $rawdata = file_get_contents('data.txt');

    //    traitement des données
    $boardingPasses = preg_split("/\n/", $rawdata);

// PARTIE 1 ----------------------
    //    7 premiers chiffres = on précise le row
    function seven ($str){
        $maxRow = 127;
        $minRow = 0;
        for ($i = 0; $i < 7; $i++) {
            if ($i < 6) {
                if ($str[$i] === "F") {
                    $maxRow -= ($maxRow - $minRow) / 2;
                } else {
                    $minRow += ($maxRow - $minRow) / 2;
                }
            } elseif ($i = 6) {
                if ($str[$i] === "F") {
                    $keyRow = ceil($minRow);
                    return $keyRow;
                } else {
                    $keyRow = floor($maxRow);
                    return $keyRow;
                }
            }
        }
    }

    // 3 derniers chiffres = on cherche le siège
    function three ($str){
        $maxCol = 7;
        $minCol = 0;

        for($i = 7; $i < strlen($str); $i++){
            if ($i < 9) {
                if ($str[$i] === "L") {
                    $maxCol -= ($maxCol - $minCol) / 2;
                } else {
                    $minCol += ($maxCol - $minCol) / 2;
                }
            } elseif ($i = 9) {
                if ($str[$i] === "L") {
                    $keyCol = ceil($minCol);
                    return $keyCol;
                } else {
                    $keyCol = floor($maxCol);
                    return $keyCol;
                }
            }
        }
    }

    // On calcule l'id avec la rangée et le siège
    function ID ($str){
        $row = seven($str);
        $col = three($str);
        $id = ($row*8)+$col;

        return $id;
    }

    // Il ne reste plus qu'à looper au au sein des données pour trouver quelle est l'id la plus élevée;
    $ids = [];
    foreach($boardingPasses as $str){
        $ids[] = ID($str);
    }


//    PARTIE 2 ----------------------
    // Dans ma liste d'ids, il en manque UNE et c'est celle que je cherche
    sort($ids);
    for ($i =0; count($ids); $i++){
        if($ids[$i+1] === $ids[$i]+2 ){
            echo $i.' '.$ids[$i];
        }
    }



?>