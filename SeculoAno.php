<?php

function seculoAno($year) {
    return intval(($year-1)/100)+1;
}

$year = readline('Digite o ano: ');

try {
    if($year <= 0)
        throw new Exception('O ano deve ser maior que 0');
    if($year >= 100000)
        throw new Exception('O valor limite é até 100000');
    
    echo 'O século deste ano é ' . seculoAno($year) . "\n";

} catch(Exception $error) {
    echo $error->getMessage() . "\n";
    exit(1);
}