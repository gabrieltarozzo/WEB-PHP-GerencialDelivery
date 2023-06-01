<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"../config.php";
$filterEmp=$_GET["idEmpresa"];
         $idC=$_GET["idC"];
    //    $categoria=$_GET["categoria"]; //mandar por http pra ca

    //$result=explode(",", implode($checkbox_id));


    //echo $result[0]; // vetor1
    //echo $result[1]; // vetor2
    //echo $result[2]; // vetor3
   // $adicional_id = $result[0];
    //$categoria_id = $result[1];
    //$i = $result[2];
// if $idc[0] != '' { echo $idc[0] }
       //  echo $idC[0];
       //  echo $idC[1];



  $query = "SELECT id, nome, valor, empresa FROM adicionais where empresa = '$filterEmp' and id in ('$idC')";

 $result = $conn->query($query);
	     $outp = "";

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"nome":"'.$rs["nome"].'",';
        $outp .= '"valor":"'.$rs["valor"].'",';
  		$outp .= '"empresa":"'.$rs["empresa"]. '"}';
    }
   // $outp ='{"records":['.$outp.']}';
   // echo $outp;
 
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);

?>
