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
                $num = intval(substr($ligne[$i],1));
                    $x += $num;
                    $coordonnees[] = [$x,$y];
            }
            elseif($ligne[$i][0] == "L"){
                $num = intval(substr($ligne[$i],1));
                    $x -= $num;
                    $coordonnees[] = [$x,$y];
                
            }
            elseif($ligne[$i][0] == "U"){
                $num = intval(substr($ligne[$i],1));
                    $y += $num;
                    $coordonnees[] = [$x,$y];
                
            }
            elseif($ligne[$i][0] == "D"){ 
                $num = intval(substr($ligne[$i],1));
                    $y -= $num;
                    $coordonnees[] = [$x,$y];
                
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

    // JE COUPE MES TABLEAUX DE COORDONNÉES EN AUTANT DE TABLEAUX QU'ILS ONT DE SECTIONS
    function section($val){
        return  array_chunk($val,2);
    }

    $section1 = section($coordonnees1);
    $section2 = section($coordonnees2);

    // SECOND ATTEMPT : GENERATING A LOOP THAT COMPARES EACH COORDINATES VERY MANUALLY -- NOTHING COMES OUT OF IT ..
    // for ($i = 0; $i <= 300; $i++){
    //         if ($coordonnees1[$i][0] == $coordonnees2[$i][0] || $coordonnees1[$i][1] == $coordonnees2[$i][1]){
    //             echo $i." and ".$j;
    //             print_r($coordonnees1[$i]);
            
    //     }
    // }

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