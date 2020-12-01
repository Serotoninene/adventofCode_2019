<?php

// PARTIE 1
    // Rassembler toutes les données dans un tableau
    $data = preg_split("/\n/", file_get_contents('data.txt'));
    
    // Créer un second tableau avec le niveau de fuel nécessaire par module
    $fuel = [];
    foreach ($data as $val){
        $val = floor($val/3)-2; 
        $fuel [] = $val;
    }

    // print_r(array_sum($fuel));

// PARTIE 2
    // Pour chacune des valeurs de fuel, besoin de trouver la quantité de fuel nécessaire - fuel = mass

    $addFuel = [];
    foreach ($fuel as $val){
        
        $addFuel = $val;
        while ($addFuel >=0){
            $addFuel = floor($addFuel/3)-2;
            if($addFuel > 0){
            $totalAddFuel[] = $addFuel; 
            }
        }
    }

    var_dump($totalAddFuel);
    print_r(array_sum($totalAddFuel) + array_sum($fuel));
    
?>