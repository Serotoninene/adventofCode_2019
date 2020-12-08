<?php

// PARTIE 1
// Traitement de la DATA
$rawdata = preg_split("/\n/", file_get_contents('data.txt'));
$count = 0;

for($i = 0; $i < sizeof($rawdata); $i++){
    // On scinde les infos en deux en délimitant via le ":"
    $cuttedData = explode(":", $rawdata[$i]);

    // On récupère le password qui est la deuxième partie du bousin
    $pw = trim($cuttedData[1]);

    // Traitement des policies
    $rawpolicy = trim($cuttedData[0]);
    $policy = preg_split("/[\s,]+/", $rawpolicy);

    // On récupère les chiffres d'un côté et la lettre de l'autre
    $policyNumbers = explode("-",$policy[0]);
    $policyLetter = $policy[1];

    $num = $num = substr_count($pw,$policyLetter);

//    if( $num >= $policyNumbers[0] && $num <= $policyNumbers[1]){
//        $count += 1;
//    }

}

// PARTIE 2

for($i = 0; $i < sizeof($rawdata); $i++) {
    // On scinde les infos en deux en délimitant via le ":"
    $cuttedData = explode(":", $rawdata[$i]);

    // On récupère le password qui est la deuxième partie du bousin
    $pw = trim($cuttedData[1]);

    // Traitement des policies
    $rawpolicy = trim($cuttedData[0]);
    $policy = preg_split("/[\s,]+/", $rawpolicy);

    // On récupère les chiffres d'un côté et la lettre de l'autre
    $policyNumbers = explode("-", $policy[0]);
    $policyLetter = $policy[1];

//    Il faut que la lettre à la position $policyNumbers[0] ou  $policyNumbers[1] soit $policyLetter, mais UNE SEULE

    if ($pw[$policyNumbers[0]-1] === $policyLetter && $pw[$policyNumbers[1]-1] === $policyLetter){
        $count += 0;
    } elseif ($pw[$policyNumbers[0]-1] === $policyLetter || $pw[$policyNumbers[1]-1] === $policyLetter){
        $count += 1  ;
    }

}

$testPw = "dddtzdd";
$testNum = [1,2];
$testLet = "d";
$test = 0;
if ($testPw[$testNum[0]-1] === $testLet && $testPw[$testNum[1]-1] === $testLet){
    $test += 0;
} else if ($testPw[$testNum[0]-1] === $testLet || $testPw[$testNum[1]-1] === $testLet){
    $test += 2;
}

var_dump($count);

?>