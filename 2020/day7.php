<?php
// Réception des données
$rawData = preg_split("/\n/", file_get_contents('data.txt'));

// Je cherche les lignes où apparait "shiny gold bag"
// en fait il fuat que je scinde mes lignes à partir de "contain"
$firstCount = 0;
$bag = [];
$contain = [];
$data = [];
$compteur = [];
foreach($rawData as $k => $v){
    $data [] = explode('contain', $v);
    $bag[] = trim($data[$k][0]);
    $contain[] = trim($data[$k][1]);
    if (stristr($contain[$k], 'shiny gold bag')) {
//        echo $k." => ".$v;
//        echo "\n";
        $compteur [] = $k;
        $firstCount += 1;
    }
}

echo "au 1er degré, le 'shiny gold bag' peut être contenu dans #".$firstCount." sacs.";
echo "\n";

// Il faut que je reprenne le tableau de bags avec les bons bags et que je répète la formule jusqu'à ce que l'on arrive aux bags ultimes;

$secondCount = 0;
foreach ($data as $k => $v){
    for ($i = 0; $i < count($compteur); $i++){
        if (stristr($contain[$k], $bag[$compteur[$i]])){
       /*     echo $bag[$k];
            echo "\n";*/
            $secondCount += 1;
            $compteur [] = $k;
        }
    }
}

echo "au 2e degré, le 'shiny gold bag' peut être contenu dans #".$secondCount." sacs.";

// Il faut maintenant voir le 3è degré ...

$thirdCount = 0;
foreach ($data as $k => $v){
    for ($i=0; $i < count($compteur); $i++){
        if(stristr($contain[$k], $bag[$compteur[$i]])){
            $thirdCount += 1;
        }
    }
}

echo $thirdCount;
?>