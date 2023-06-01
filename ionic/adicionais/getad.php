<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

    include"../config.php";
$filterEmp=$_GET["empresa"];
         $idAD=$_GET["idAD"];
    //    $categoria=$_GET["categoria"]; //mandar por http pra ca

    //$result=explode(",", implode($checkbox_id));
    //echo $result[0]; // vetor1
    //echo $result[1]; // vetor2
    //echo $result[2]; // vetor3
   // $adicional_id = $result[0];
    //$categoria_id = $result[1];
    //$i = $result[2];
         //If $idc[0] != '' { echo $id}
// if $idc[0] != '' { echo $idc[0] }
       //  echo $idC[0];
       //  echo $idC[1];

$params = explode(',', $idAD);

  //$query = "SELECT * FROM adicionais where empresa = '$filterEmp' and id in ('$idC')";

echo '{"records":[';

$cas = 2;
   foreach($params as $result) {
         $query = "SELECT * FROM adicionais where id in ('$result') and empresa = '$filterEmp' and desativado = 0";

 $result = $conn->query($query);
       $outp = "";

    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
 if ($cas != "2") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
        $outp .= '"nome":"'.$rs["nome"].'",';
        $outp .= '"valor":"'.$rs["valor"].'",';
        $outp .= '"desativado":"'.$rs["desativado"].'",';
      $outp .= '"empresa":"'.$rs["empresa"]. '"}';
$cas = 4;

    }
    echo($outp);

}
echo ']}';
    $conn->close();
?>
