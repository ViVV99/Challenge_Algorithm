<?php

$repetitionList = array();
$numberList = array();

for ($i=0; $i <20 ; $i++) {
    
    $randomNumber = rand(1, 10);
    $numberList[$i] = $randomNumber;
    
    if(empty($repetitionList["{$randomNumber}"])) 
        $repetitionList["{$randomNumber}"]=0;
    
    $repetitionList["{$randomNumber}"]++;        
} 

echo 'Array sorteado: ' . json_encode($numberList) . "\n";

$filteredNumberList = array_filter($repetitionList, function ($val) {
    if($val == 1)
        return $val;
});

try {
    if(sizeof($filteredNumberList) == 0)
        throw new Exception('Todos os números se repetiram!');

    $answer = 'Os números que não se repetem são ';
    $numbers = array_keys($filteredNumberList);
    $totalNumbers = sizeof($numbers);

    for($i= 1; $i<=$totalNumbers; $i++){
        $answer = $answer . $numbers[$i-1] . (($i!=$totalNumbers)? ', ' : ".\n");
    }
    
} catch(Exception $error) {
    $answer = $error->getMessage() . "\n";
}

echo $answer;