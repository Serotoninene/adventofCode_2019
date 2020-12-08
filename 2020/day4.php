<?php

    // PARTIE 1
    $rawdata = file_get_contents('data.txt');
    // J'ai besoin de séparer mes données par les sauts à la ligne
    $data = preg_split("/\n\n/", $rawdata);

    // Il ne faut valider que les tableaux comportant byr, iyr, eyr, hgt, hcl, ecl, pid, cid ou (-cid)
    $count = 0;
    foreach($data as $val){
        if (strstr($val, "byr") && strstr($val, "iyr") && strstr($val, "eyr") && strstr($val, "hgt") && strstr($val, "hcl") && strstr($val, "ecl" ) && strstr($val, "pid") && strstr($val, "cid")){
            $count += 1;
        }elseif (strstr($val, "byr") && strstr($val, "iyr") && strstr($val, "eyr") && strstr($val, "hgt") &&    strstr($val, "hcl") && strstr($val, "ecl" ) && strstr($val, "pid")){
            $count += 1;
        }
    }

    //PARTIE 2
    // Les champs doivent maintenant être valides et répondre à certains critères

    // Maintenant que j'ai rangé mes values, il faut que je désigne les règles qu'elles doivent suivrent
    function tri ($donneesBrutes){
        // Je lance toutes les variables que je vais abreuver en data au fil de la fonction
        $countTri = 0;
        $treatedData = [];
        $values = [];

        // Traitement des données - le but est d'avoir, pour chaque passeport, le champ en index de sa valeur (si ça fait sens)
        if (is_array($donneesBrutes)){
            foreach($donneesBrutes as $val){
                $treatedData [] = preg_split('/[\s]+/', $val);
            }
        }else{
            $treatedData [] = preg_split('/[\s]+/', $donneesBrutes);
        }

        foreach ($treatedData as $ind => $val){
            for($i = 0; $i < sizeof($val); $i++){
                $values [$ind][substr($val[$i],0,3)] = substr($val[$i], 4);
            }
        }

        foreach ($values as $val){
            if(
                strlen($val["byr"]) === 4 && $val["byr"] >= 1920 && $val["byr"] <= 2002 &&
                strlen($val["iyr"]) === 4 && $val["iyr"] >= 2010 && $val["iyr"] <= 2020 &&
                strlen($val["eyr"]) === 4 && $val["eyr"] >= 2020 && $val["eyr"] <= 2030 &&
                ((substr($val["hgt"], -2) === "cm" && $val["hgt"] >= 150 && $val["hgt"] <= 193) ||
                (substr($val["hgt"], -2) === "in" && $val["hgt"] >= 59 && $val["hgt"] <= 76)) &&
                strlen($val['hcl']) === 7 && preg_match("/^#([a-fA-F0-9]{6})$/", $val["hcl"]) &&
                strlen($val["ecl"]) === 3 && preg_match(("/(amb)|(blu)|(brn)|(gry)|(grn)|(hzl)|(oth)/"), $val["ecl"]) &&
                strlen($val["pid"]) === 9 && substr($val["pid"], 0, 1) == 0
            ){
                $countTri += 1;
            }
        }
        return $countTri;
    }

    // Je reprend ma première boucle de tri
    $count = 0;

    foreach($data as $dat){
            if (strstr($dat, "byr") && strstr($dat, "iyr") && strstr($dat, "eyr") && strstr($dat, "hgt") && strstr($dat, "hcl") && strstr($dat, "ecl" ) && strstr($dat, "pid") && strstr($dat, "cid")){
                $count += 1;
            }elseif (strstr($dat, "byr") && strstr($dat, "iyr") && strstr($dat, "eyr") && strstr($dat, "hgt") &&    strstr($dat, "hcl") && strstr($dat, "ecl" ) && strstr($dat, "pid")){
                $count += 1;
            }
    }

    echo $count;

?>