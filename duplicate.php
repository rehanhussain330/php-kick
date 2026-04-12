<?php 

$data = [1,5,4,3,2,6,7,8,9,2,3];

$temp = [];

foreach($data as $d){
  if(!in_array($d,$temp)){
    $temp[] = $d;
  }
}
print_r($temp);