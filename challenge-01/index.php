<?php

function findPoint($strArr) {
    // Convertir las cadenas a arrays de enteros
    $list1 = array_map('intval', explode(', ', $strArr[0]));
    $list2 = array_map('intval', explode(', ', $strArr[1]));

    // Encontrar intersección
    $intersection = array_intersect($list1, $list2);

    if (empty($intersection)) {
        return "false";
    }

    // Ordenar (por si acaso, aunque las entradas ya están ordenadas)
    sort($intersection);

    // Convertir a cadena separada por comas
    return implode(',', $intersection);
}

// tests
echo findPoint(["1, 3, 4, 7, 13", "1, 2, 4, 13, 15"]) . "\n";;
echo findPoint(["1, 3, 9, 10, 17, 18", "1, 4, 9, 10"]) . "\n";;