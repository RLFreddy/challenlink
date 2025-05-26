<?php

function noIterate($strArr) {
    $N = $strArr[0];
    $K = $strArr[1];
    $lenN = strlen($N);
    $lenK = strlen($K);
    
    if ($lenN < $lenK) {
        return "";
    }

    // Contar frecuencias de caracteres en K
    $charCountK = array_count_values(str_split($K));
    $required = count($charCountK);
    
    // Variables para el seguimiento de la ventana
    $left = 0;
    $right = 0;
    $formed = 0;
    $windowCounts = [];
    
    // Resultados
    $minLength = PHP_INT_MAX;
    $result = "";
    
    while ($right < $lenN) {
        $char = $N[$right];
        $windowCounts[$char] = ($windowCounts[$char] ?? 0) + 1;
        
        if (isset($charCountK[$char])) {
            if ($windowCounts[$char] == $charCountK[$char]) {
                $formed++;
            }
        }
        
        // Intentar contraer la ventana desde la izquierda
        while ($left <= $right && $formed == $required) {
            $currentLength = $right - $left + 1;
            
            // Actualizar el resultado si encontramos una ventana más pequeña
            if ($currentLength < $minLength) {
                $minLength = $currentLength;
                $result = substr($N, $left, $currentLength);
            }
            
            $leftChar = $N[$left];
            $windowCounts[$leftChar]--;
            
            if (isset($charCountK[$leftChar])) {
                if ($windowCounts[$leftChar] < $charCountK[$leftChar]) {
                    $formed--;
                }
            }
            
            $left++;
        }
        
        $right++;
    }
    
    return $result;
}

// tests
echo noIterate(["ahffaksfajeeubsne", "jefaa"]); // Output: "aksfaje"
echo "\n";
echo noIterate(["aaffhkksemckelloe", "fhea"]);  // Output: "affhkkse"
echo "\n";