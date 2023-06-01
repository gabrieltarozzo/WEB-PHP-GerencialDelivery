<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"../config.php";

         $filterEmp=$_GET["idEmpresa"];
        $idProduto=$_GET["idProduto"]; //mandar por http pra ca

$query = "SELECT * FROM complementos where desativado = 0 and idProduto = '$idProduto' and empresa = '$filterEmp' ORDER BY valorComplemento asc ";

 $result = $conn->query($query);
	     $outp = "";

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {

        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"categoriaComplemento":"'.$rs["categoriaComplemento"].'",';
        $outp .= '"qtdMin":"'.$rs["qtdMin"].'",';
        $outp .= '"qtdMax":"'.$rs["qtdMax"].'",';
        $outp .= '"CompleObriga":"'.$rs["CompleObriga"].'",';
        $outp .= '"nomeComplemento":"'.$rs["nomeComplemento"].'",';
        $outp .= '"descComplemento":"'.$rs["descComplemento"].'",';
        $outp .= '"valorComplemento":"'.$rs["valorComplemento"].'",';
         $outp .= '"valorDesconto":"'.$rs["valorDesconto"].'",';
        $outp .= '"numbercomple":"'.$rs["numbercomple"].'",';
        $outp .= '"numbercat":"'.$rs["numbercat"].'",';
        $outp .= '"idProduto":"'.$rs["idProduto"].'",';
        $outp .= '"desativado":"'.$rs["desativado"].'",';
  		$outp .= '"empresa":"'.$rs["empresa"]. '"}';
    }
   // $outp ='{"records":['.$outp.']}';
   // echo $outp;
 
    $outp ='{"records":['.$outp.']}';
    $conn->close();


    echo($outp);

?>
