<?php

// PARTIE 1
// Récupération des datas
$rawData = preg_split("/\n\n/", file_get_contents('data.txt'));

// Pour chaque groupe, création de nouvelles lignes pour les individus
$groups = [];
foreach ($rawData as $val){
    $groups[] = preg_split("/\n/", $val);
}

// Ok maintenant comptabiliser les questions répondues par groupe
    // test sur le groupe #503 :

   /* $test = $groups[503];
    $testImp = implode($test);
    $testIndividuals = str_split($testImp, 1);
    $testAnswers = [];
    foreach ($testIndividuals as $answer){
        if (in_array($answer, $testAnswers)){

        }else{
            $testAnswers[] = $answer;
        }
    }*/

    // var_dump($testAnswers);
    // echo count($testAnswers);

// Appliquer à l'ensemble des résultats;
$count = [];
foreach ($groups as $group){
    $groupStr = implode($group);
    $individuals = str_split($groupStr, 1);
    $answers = [];
    foreach($individuals as $answer){
        if(in_array($answer, $answers)){

        }else{
            $answers [] = $answer;
        }
    }
    $count[] = count($answers);
}
//var_dump($count);
//echo array_sum($count);

// PARTIE 2
// Seules comptent les réponses où TOUS LES PARTICIPANTS D'UN GROUPE ONT RÉPONDU OUI

/*    //test avec le dernier groupe uniquement
    $test = $groups[503];
    $testv2 = [];
    foreach ($test as $val){
        $testv2 [] = str_split($val, 1);
    }


    $intersect = call_user_func_array('array_intersect',$testv2);
    //    var_dump(count($intersect));*/

// J'applique à l'ensemble des solutions :)
$count = [];
foreach ($groups as $preGroup){
    $group = [];
    if (count($preGroup) == 1){
        $count [] = strlen($preGroup[0]);
    }else{
        foreach ($preGroup as $val){
            $group [] = str_split ($val, 1);
        }
        $intersect = call_user_func_array('array_intersect', $group);
        $count [] = count($intersect);
    }
}
echo array_sum($count);




