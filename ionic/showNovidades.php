<?php


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Accept: application/json");


//header("Access-Control-Allow-Origin:http://localhost:8100");
//header("Content-Type: application/x-www-form-urlencoded");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		include"config.php";
$chave=$_GET["chave"];
$chaveH = '';

         $idEmpresa=$_GET["idEmpresa"];

if($chave == $chaveH){
    //exibe json

		$query="SELECT * FROM novidades  where empresa = '$idEmpresa' ";
		$result = $conn->query($query);

		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"nome":"'.$rs["nome"].'",';
        $outp .= '"empresa":"'.$rs["empresa"].'",';
        $outp .= '"situacao_id":"'.$rs["situacao_id"].'",';
        $outp .= '"descricao":"'.$rs["descricao"].'",';
  		$outp .= '"imagens":"'.$rs["imagens"]. '"}';
    }

    $outp ='{"records":['.$outp.']}';

    $conn->close();

    echo ($outp);
} else{

    echo "lanchão do sérgiao";
     $conn->close();
}

?>


