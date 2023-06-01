<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

        include"config.php";
        $chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){

        $idEmpresa=$_GET["idEmpresa"];

		$query="SELECT * FROM EMPRESAS where ID_EMPRESA = '$idEmpresa'";
		$result = $conn->query($query);
//falta mexer aquitudo
		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
              $outp .= '"NOME":"'.$rs["NOME"].'",';
              $outp .= '"ApxEntrega":"'.$rs["ApxEntrega"].'",';
              $outp .= '"MaiorQue":"'.$rs["MaiorQue"].'",';
              $outp .= '"desativarPromo":"'.$rs["desativarPromo"].'",';
  		      	$outp .= '"ApxRetirada":"'.$rs["ApxRetirada"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    
    $conn->close();

    echo($outp);
} else{
 $conn->close();
    echo "lanchão do sérgiao";
}

?>
