<?php

/* $testArray = [
[1, 3, 2, 1],
[1, 3, 2],
[1, 2, 1, 2],
[3, 6, 5, 8, 10, 20, 15],
[1, 1, 2, 3, 4, 4],
[1, 4, 10, 4, 2],
[10, 1, 2, 3, 4, 5],
[1, 1, 1, 2, 3],
[0, -2, 5, 6],
[1, 2, 3, 4, 5, 3, 5, 6],
[40, 50, 60, 10, 20, 30],
[1, 1],
[1, 2, 5, 3, 5],
[1, 2, 5, 5, 5],
[10, 1, 2, 3, 4, 5, 6, 1],
[1, 2, 3, 4, 3, 6],
[1, 2, 3, 4, 99, 5, 6],
[123, -17, -5, 1, 2, 3, 12, 43, 45],
[3, 5, 67, 98, 3]
];

for($i=0; $i<sizeof($testArray); $i++){
    try {
    $currentArray = $testArray[$i];
    echo json_encode($currentArray) . " ";
    $flag = 0;
    
    if(sizeof($currentArray) <= 2) {
        echo "true \n";
        continue;
    }
        
    for($j=1; $j<sizeof($currentArray); $j++) {      
        $resultado = $currentArray[$j-1] >= $currentArray[$j];
        if($currentArray[$j-1] >= $currentArray[$j]) {
           echo 'É maior sim' .  "\n";
           
           if($j === sizeof($currentArray)-1 AND $flag == 0)
            break;

            $flag++; 
            array_splice($currentArray, $j-1, 1);
            $currentArray = array_values($currentArray);

        if($j == 1){
            $j-=1;
        
        }
        if($j >1 ){
            $j-=2;
        }

        }

        if($flag>1){
            throw new Exception();
        }
    }
    
    echo "true \n";
    } catch (Exception $error){
        echo "false \n";

    }
}

 */




function sequenciaCrescente($currentArray){

    try {
        echo json_encode($currentArray) . " ";
        $flag = 0;
    
        if(sizeof($currentArray) <= 2) {
            echo "true \n";
        }
        
        for($j=1; $j<sizeof($currentArray); $j++) {
            $resultado = $currentArray[$j-1] >= $currentArray[$j];
            if($currentArray[$j-1] >= $currentArray[$j]) {      
                if($j === sizeof($currentArray)-1 AND $flag == 0)
                    break;

                $flag++;
                array_splice($currentArray, $j-1, 1);
                $currentArray = array_values($currentArray);
          
                if($j == 1){
                    $j-=1;
                }
                if($j >1 ){
                    $j-=2;
                }
            }

            if($flag>1){
                throw new Exception();
            }
        }
    
    echo "true \n";
    } catch (Exception $error){
        echo "false \n";

    }
}

$array = [];

while(true) {
    echo "Para iniciar, digite 'comecar' \n";
    $readValue = readline('Digite os numeros para serem inseridos no array:');
    
    if(is_numeric($readValue)){
        array_push($array, intval($readValue));
        echo 'Valor adicionado! Array agora está: ' . json_encode($array) . "\n\n";
    }

    if(!is_numeric($readValue)){
        if($readValue == 'comecar' && sizeof($array) > 0){
            sequenciaCrescente($array);
            break;
        }

        if($readValue != 'comecar' && sizeof($array) <= 0)
            echo "Por favor, verifique se o array está com valores ou se escreveu coemcar corretamente! \n";
    }
}