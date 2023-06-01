<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



		include"config.php";

         $idEmpresa=$_GET["idEmpresa"];

		$query="SELECT * FROM categoria_produtos where empresa = '$idEmpresa' "; // id do cliente.
		$result = $conn->query($query);


		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"nome":"'.$rs["nome"].'",';
        $outp .= '"semObs":"'.$rs["semObs"].'",';
        $outp .= '"empresa":"'.$rs["empresa"].'",';
        $outp .= '"adicional":"'.$rs["adicional"].'",';
         $outp .= '"meio":"'.$rs["meio"].'",';
         $outp .= '"codigo":"'.$rs["codigo"].'",';
        $outp .= '"situacao_id":"'.$rs["situacao_id"].'",';
  			$outp .= '"imagens":"'.$rs["imagens"]. '"}';

    }
    $outp ='{"records":['.$outp.']}';

    //echo json_encode($output,JSON_NUMERIC_CHECK);

    $conn->close();


    echo($outp);


?>
