<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";
$chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){
        $idEmpresa=$_GET["idEmpresa"];
        

		$query="SELECT * FROM ValorPMin where empresa='$idEmpresa'";
		$result = $conn->query($query);
//falta mexer aquitudo
		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"valorMin":"'.$rs["valorMin"].'",';
  			$outp .= '"empresa":"'.$rs["empresa"]. '"}';
    }


    $outp ='{"records":['.$outp.']}';
    $conn->close();

    echo($outp);
    } else{
 $conn->close();
    echo "lanchão do sérgiao";
}


?>
