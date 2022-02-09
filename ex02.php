<?php
/*primeiro cria uma variavel onde
armazenaremos o nome do arquivo que queremos abrir
*/
$filename = "usuario.csv";
$delimitador = ",";

/*agora verifica se o arquivo existe
se existir abra ele no modo leitura
*/

if(file_exists($filename)){
    /*
    abre o arquivo com fopen no modo leitura
    e armazena na variavel $file
    */

    $file = fopen($filename,"r");

    
    /*
    ler a primeira linha do arquivo que no caso e o cabecalho do csv
    pega o cabecalho do csv e transforma em uma array com exploder
    */
    $headers = explode($delimitador,fgets($file));
    $data = array();

    while($row = fgets($file)){

        $rowData = explode($delimitador,fgets($file));

        $linha = array();

        for($i = 0 ; $i < count($headers); $i++){
           //echo (isset($rowData[$i])) ?  $rowData[$i] : "";
            //echo $rowData[$i]."<br>";
            $linha[$headers[$i]] = (isset($rowData[$i])) ?  $rowData[$i] : "";
        }

        array_push($data,$linha);

    }

    fclose($file);

    echo json_encode($data,JSON_UNESCAPED_SLASHES);





}//fim do if arquivo exixte