<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"../config.php";

         $filterEmp=$_GET["idEmpresa"];
        $categoria=$_GET["categoria"]; //mandar por http pra ca

$query = "SELECT * FROM categorias_adicionais where desativado = 0 and categoria_id = '$categoria' and empresa = '$filterEmp'";

 $result = $conn->query($query);
	     $outp = "";

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"categoria_id":"'.$rs["categoria_id"].'",';
        $outp .= '"adicional_id":"'.$rs["adicional_id"].'",';
        $outp .= '"checkbox_id":"'.$rs["checkbox_id"].'",';
        $outp .= '"desativado":"'.$rs["desativado"].'",';
  		$outp .= '"empresa":"'.$rs["empresa"]. '"}';
    }
   // $outp ='{"records":['.$outp.']}';
   // echo $outp;
 
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);

?>
