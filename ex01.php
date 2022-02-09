<?php
$filename = "usuario.csv";

if(file_exists($filename)){

    $file = fopen($filename,"r");
    //fget lerlinha por linha do arquivo
//pega primeira linha do arquivo  em string 
//usamos o explode para  transforma a sting separada por , e transforma em um array
    $headers = explode(",",fgets($file));

$data = array();

    //enquanto exitir linha ler 
    while($row = fgets($file)){

$rowData = explode(",",$row);
$linh = array();

for($i = 0;$i < count($headers);$i++){
  $linh[$headers[$i]] = $rowData[$i];
    }

    array_push($data,$linh);
 }

 fclose($file); 
}


echo json_encode($data);