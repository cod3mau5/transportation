<?php

function solution($a)
{
        // creamos las variables para guardar las alturas de las personas y las posiciones de los árboles
        $people = [];
        $trees = [];

        // Guardamos los arboles en un array con su posicion y las alturas de personas en el otro array
        foreach ($a as $i => $height) {
            if ($height == -1) {
                $trees[$i] = $height;
            } else {
                $people[] = $height;
            }
        }

        // Ordenamos las alturas de las personas de menor a mayor
        sort($people);

        // Posicionamos los árboles donde deben de estar considerando a las personas
        foreach ($trees as $i => $tree) {
            array_splice($people, $i, 0, $tree);
        }

        return $people;
}

    if($trip_type=="o_a" || $trip_type=="o_d"){
     echo "o";
    }elseif($trip_type=="o_d"){
       echo "r";
    }else{
        echo "";
    }
