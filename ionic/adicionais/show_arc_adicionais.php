<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"../config.php";

$filterEmp=$_GET["idEmpresa"];
  $query = "SELECT * FROM adicionais where desativado = 0 and empresa = '$filterEmp' order by nome";

 $result = $conn->query($query);
	     $outp = "";

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"nome":"'.$rs["nome"].'",';
        $outp .= '"valor":"'.$rs["valor"].'",';
        $outp .= '"desativado":"'.$rs["desativado"].'",';
  		$outp .= '"empresa":"'.$rs["empresa"]. '"}';
    }
   // $outp ='{"records":['.$outp.']}';
   // echo $outp;
 
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);

?>
