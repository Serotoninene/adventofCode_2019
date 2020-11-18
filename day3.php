<?php

    // GET THE DATA
    $data = file_get_contents('data.txt');

    // MAKE TWO ARRAYS OF THEM
    $explode = explode("\n", $data);

    $ligne1 = explode(",",$explode[0]);
    $ligne2 = explode(",",$explode[1]);

   

    /* DATAS ARE COORDONNATES ON AN ORTHONORMED PLAN  => 
        R = +x;
        L = -x; 
        U = +y;
        D = -y;

        O being the intersection point the x and y axis
    */

    // CREATE A FUNCTION THAT GENERATE THE COORDONATES OF THE LINES AND PUT THEM INTO AN ARRAY
    function itineraire ($ligne){
        $x = 0;
        $y = 0;
        $coordonnees = [];

        for ($i = 0 ; $i <= 300; $i++){
            if ($ligne[$i][0] == "R"){
                $x += intval(substr($ligne[$i],1));
                $coordonnees[$i] = [$x,$y];
            }
            elseif($ligne[$i][0] == "L"){
                $x -= intval(substr($ligne[$i],1));
                $coordonnees[$i] = [$x,$y];

            }
            elseif($ligne[$i][0] == "U"){
                $y += intval(substr($ligne[$i],1));
                $coordonnees[$i] = [$x,$y];

            }
            elseif($ligne[$i][0] == "D"){ 
                $y -= intval(substr($ligne[$i],1));
                $coordonnees[$i] = [$x,$y];
            }   
        }
        return $coordonnees;
        
    }

    // Putting the coordinates into two variables
    $coordonnees1 = itineraire($ligne1);
    // print_r($coordonnees1);
    $coordonnees2 = itineraire ($ligne2);
    // print_r($coordonnees2);

    // FIRST ATTEMPT : ARR_INTERSECT GIVES ME ALL THE COORDONNATES OF LINE 1
    // $intersections [] = array_intersect($coordonnees1,$coordonnees2);
    // print_r($intersections);

    // SECOND ATTEMPT : GENERATING A LOOP THAT COMPARES EACH COORDINATES VERY MANUALLY -- NOTHING COMES OUT OF IT ..
    for ($i = 0; $i <= 300; $i++){
        for ($j = 0; $j <= 300; $j++){
            if ($coordonnees1[$i][0] == $coordonnees2[$j][0] || $coordonnees1[$i][1] == $coordonnees2[$j][1]){
                echo $i." and ".$j;
                print_r($coordonnees1[$i]);
            }
        }
    }
    
        // $result = array_intersect($coordonnees1,$coordonnees2);
        // print_r($result);

    // je cherche le point où elle est minimale ... ok j'ai mis la charrue avant les boeufs, y a rien dans ma variable

    // Je calcule la distance Manhattan;
    function distance ($ligne){
        $distance = [];
        for ($i = 0; $i <= 300; $i++){
           $distance [$i] = array_sum($ligne[$i]);
        }
        return $distance;
    }

    $distance1 = distance($coordonnees1);
    $distance2 = distance($coordonnees2);
    // print_r($distance2);
   
   
?> 