<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



		include"config.php";
        $chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){
    $idUser=$_GET["idUser"];

		$query="SELECT * FROM pedidos where id_usuarios='$idUser' order by id desc LIMIT 10";
		$result = $conn->query($query);

//falta adicionar o restante dos valores
		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
       // $outp .= '"idUser":"'.$rs["idUser"].'",';
        $outp .= '"nomeProduto":"'.$rs["nomeProduto"].'",';
        $outp .= '"descricao":"'.$rs["descricao"].'",';
        $outp .= '"nomeAd":"'.$rs["nomeAd"].'",';
        $outp .= '"metricaValor":"'.$rs["metricaValor"].'",';
        $outp .= '"valorAd":"'.$rs["valorAd"].'",';
        $outp .= '"frete":"'.$rs["frete"].'",';
        $outp .= '"status":"'.$rs["status"].'",';
        $outp .= '"telefoneCliente":"'.$rs["telefoneCliente"].'",';
        $outp .= '"created":"'.$rs["created"].'",';
        $outp .= '"id_entrega":"'.$rs["id_entrega"].'",';
  			$outp .= '"valor":"'.$rs["valor"]. '"}';

    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);
} else{

    echo "lanchão do sérgiao";
     $conn->close();
}

?>
