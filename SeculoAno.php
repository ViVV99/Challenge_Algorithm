<?php

function seculoAno($year) {
    return intval(($year-1)/100)+1;
}

while(true) {
    $year = readline('Digite o ano: ');

    try {
        if(!is_numeric($year)){
            throw new Exception('Por favor, informe um número');
        }
        if($year <= 0)
            throw new Exception('O ano deve ser maior que 0');
        if($year >= 100000)
            throw new Exception('O valor limite é até 100000');
    
        echo 'O século deste ano é ' . seculoAno($year) . "\n";
        break;

    } catch(Exception $error) {
        echo $error->getMessage() . "\n";
    }
}