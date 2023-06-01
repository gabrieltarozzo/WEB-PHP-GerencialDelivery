<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";
         $idEmpresa=$_GET["idEmpresa"];
         $idCatigoria = $_GET["idCatigoria"];

		$query="SELECT * FROM produtos  where empresa = '$idEmpresa' and categoria_produtos_id = '$idCatigoria' order by valor ";
		$result = $conn->query($query);


		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"nome":"'.$rs["nome"].'",';
        $outp .= '"situacao_id":"'.$rs["situacao_id"].'",';
        $outp .= '"descricao":"'.$rs["descricao"].'",';
        $outp .= '"valor":"'.$rs["valor"].'",';
          $outp .= '"quantidade":"'.$rs["quantidade"].'",';
         $outp .= '"empresa":"'.$rs["empresa"].'",';
        $outp .= '"promo_valor":"'.$rs["promo_valor"].'",';
        $outp .= '"metricaValor":"'.$rs["metricaValor"].'",';
        $outp .= '"tipoValor":"'.$rs["tipoValor"].'",';
        $outp .= '"temcomple":"'.$rs["temcomple"].'",';
        //vai ser necessario criar no banco valor_final, para pegar o valor com o desconto
        $outp .= '"categoria_produtos_id":"'.$rs["categoria_produtos_id"].'",';
  			$outp .= '"imagens":"'.$rs["imagens"]. '"}';

    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);


?>
