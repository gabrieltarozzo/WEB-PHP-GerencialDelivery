<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Accept: application/json");

//header("Access-Control-Allow-Origin:http://localhost:8100");
//header("Content-Type: application/x-www-form-urlencoded");
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

		include"../config.php";

        $idUser=$_GET["idUser"];
        $idProduto=$_GET["idProduto"]; //mandar por http pra ca

//$chave=$_GET["chave"];
//$chaveH = '';

        // $idEmpresa=$_GET["idEmpresa"];

//if($chave == $chaveH){
    //exibe json

		$query="SELECT * FROM complementos_produto where id_user = '$idUser' and id_produto = '$idProduto' ";
		$result = $conn->query($query);
		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"id_complemento":"'.$rs["id_complemento"].'",';
        $outp .= '"id_produto":"'.$rs["id_produto"].'",';
  		$outp .= '"id_user":"'.$rs["id_user"]. '"}';
    }

    $outp ='{"records":['.$outp.']}';

    $conn->close();

    echo ($outp);


?>


