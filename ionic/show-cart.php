<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



		include"config.php";

    $idUser=$_GET["idUser"];
            // AND situacao_id == '1'
		$query="SELECT * FROM carrinho where idUser='$idUser'";
		$result = $conn->query($query);
		$outp = "";

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"idUser":"'.$rs["idUser"].'",';
        $outp .= '"nomeAd":"'.$rs["nomeAd"].'",';
        $outp .= '"valorAd":"'.$rs["valorAd"].'",';
        $outp .= '"nomeCd":"'.$rs["nomeCd"].'",';
        $outp .= '"Pizza2":"'.$rs["Pizza2"].'",';
        $outp .= '"cupomDesconto":"'.$rs["cupomDesconto"].'",';
        $outp .= '"valorMax2":"'.$rs["valorMax2"].'",';
        $outp .= '"promo_valor2":"'.$rs["promo_valor2"].'",';
        $outp .= '"valorCd":"'.$rs["valorCd"].'",';
        $outp .= '"idProduto":"'.$rs["idProduto"].'",';
        $outp .= '"metricaValor":"'.$rs["metricaValor"].'",';
        $outp .= '"tipoValor":"'.$rs["tipoValor"].'",';
        $outp .= '"nomeProduto":"'.$rs["nomeProduto"].'",';
        $outp .= '"valor":"'.$rs["valor"].'",';
        $outp .= '"promo_valor":"'.$rs["promo_valor"].'",';
        $outp .= '"quantidade":"'.$rs["quantidade"].'",';
        $outp .= '"categoria_id":"'.$rs["categoria_id"].'",';
        $outp .= '"observacao":"'.$rs["observacao"].'",';
  		$outp .= '"imagens":"'.$rs["imagens"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);


?>
