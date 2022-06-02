<?php


function primos ($begin, $end) {
    $allNumbersArray = array();
    for($i=$begin+1; $i<$end; $i++) {
        $allNumbersArray[$i] = $i;
    }
    
    if($allNumbersArray[$begin+1] === 1)
        $allNumbersArray = array_splice($allNumbersArray, 1, sizeof($allNumbersArray)-1);

    $allNumbersArray = array_filter($allNumbersArray, function ($number) {
        if($number % 2 != 0 OR $number == 2) return $number;
    });

    $allNumbersArray = array_filter($allNumbersArray, function ($number) {
        if($number % 3 != 0 OR $number == 3) return $number;
    });

    $allNumbersArray = array_filter($allNumbersArray, function ($number) {
        if($number % 5 != 0 OR $number == 5) return $number;
    });

    $allNumbersArray = array_filter($allNumbersArray, function ($number) {
        if($number % 7 != 0 OR $number == 7) return $number;
    });
    if(sizeof($allNumbersArray) <=0)
        throw new Exception('Esse range não possui nenhum número primo');
    
    return array_values($allNumbersArray);
}

while(true) {
    try {
        $begin = readline('Numero Inicial=');
        if(!is_numeric($begin))
            throw new Exception('Por favor, informe um número');

        $end = readline('Numero Final=');
        if(!is_numeric($end))
            throw new Exception('Por favor, informe um número');

        if(!is_numeric($begin))
            throw new Exception('Por favor, informe um número');

        $begin = intval($begin);
        $end = intval($end);

        if($begin >= $end) 
            throw new Exception('O valor do inicio deve ser menor que o do fim');
        $primeNumbers = json_encode(primos($begin, $end));
        echo 'Resposta: ' . $primeNumbers . "\n";
        break;
    } catch (Exception $error) {
        echo $error->getMessage() . "\n";
    }
}  
