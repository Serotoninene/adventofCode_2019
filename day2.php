<?php 

  
    // PARTIE 1

    function output ($x,$y){ 

    // Lire les données dans une string
        $data = file_get_contents('data.txt');
    // J'enlève toutes les virgules et les utilise pour délimiter les cellules de mon tableau
        $pureData = explode(",", $data);

        
        $pureData[1] = $x;
        $pureData[2] = $y;
        
        for ($i = 0; $i < count($pureData); $i+= 4){
            if($pureData[$i] == 1){
                $pureData[$pureData[$i+3]] = $pureData [$pureData[$i+1]] + $pureData [$pureData[$i+2]];
            }elseif($pureData[$i] == 2){
                $pureData [$i+3] = $pureData [$pureData[$i+1]] * $pureData [$pureData[$i+2]];
            }elseif($pureData[$i] == 99){
                break;
            }else{
                echo "ERROR ERROR ERROR";
                break;
            }
        }

        return $pureData[0];
        // echo $pureData[0];
    }
    

    // output(12,2);

    // PARTIE 2 : trouver le nom $x et le verbe $y pour lesquel l'output = 19690720

    // TACTIQUE : FORCER LE SYSTEME, $x et $y sont compris entre 0 et 99, looper entre les deux jusqu'à bon résultat;

    for ($i = 0; $i <= 99; $i++){
        for ($j = 0; $j <=99; $j++){
            if (output($i,$j) == 19690720){

                echo "x = $i et y = $j <br>";

            }
        }
    }

?>