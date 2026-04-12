<?php 

$data = [1,5,4,3,2,6,7,8,9,2,3];

$length = count($data);

for($i = 0; $i < $length-1; $i++){
    for($j = 0; $j < $length - $i - 1; $j++){
        if($data[$j]>$data[$j+1]){
            $temp = $data[$j];
            $data[$j] = $data[$j+1];
            $data[$j+1] = $temp;
        }
    }
}

print_r($data);