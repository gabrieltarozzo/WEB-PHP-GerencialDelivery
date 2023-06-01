<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");



		include"../config.php";
        $chave=$_POST["meuID"];

    $filterEmp=$_GET["idEmpresa"];

		$query="SELECT * FROM tableCupom";
		$result = $conn->query($query);

//falta adicionar o restante dos valores
		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"valor":"'.$rs["valor"].'",';
        $outp .= '"nomeCupom":"'.$rs["nomeCupom"].'",';
        $outp .= '"qtdCupom":"'.$rs["qtdCupom"].'",';
        $outp .= '"empresa":"'.$rs["empresa"].'",';
  	    $outp .= '"CREATED":"'.$rs["CREATED"]. '"}';

    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);
 else{

    echo "lanchão do sérgiao";
     $conn->close();
}

?>
