<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

		include"config.php";


    $filterEmp=$_GET["idEmpresa"];

		$query="SELECT * FROM EMPRESAS where ID_EMPRESA ='$filterEmp'";
		$result = $conn->query($query);

		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
       if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
  	    $outp .= '"instagram":"'.$rs["instagram"].'",';
        $outp .= '"facebook":"'.$rs["facebook"].'",';
  		$outp .= '"maps":"'.$rs["maps"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();

    echo($outp);

 $conn->close();




 $query = "insert into complementos(id, nomeComplemento, descComplemento, valorDesconto, numbercomple, numbercat, pizza, desativado, idProduto, empresa)
          values('$id', '$nomeComplemento', '$descComplemento', '$valorDesconto', '$numbercomple', '$numbercat', '$pizza', '$desativado', '$idProduto', '$empresa')"
?>
