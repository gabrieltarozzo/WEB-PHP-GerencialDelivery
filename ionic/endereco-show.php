<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

        include"config.php";
        $chave=$_GET["chave"];
$chaveH = '';

if($chave == $chaveH){
        $id_usuarios=$_GET["id_usuarios"];

		$query="SELECT * FROM endereco where id_usuarios = '$id_usuarios'";
		$result = $conn->query($query);
//falta mexer aquitudo
		$outp = "";
    while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
        if ($outp != "") {$outp .= ",";}
        $outp .= '{"id":"'.$rs["id"].'",';
       // $outp .= '"id":"'.$rs["id"].'",';
              $outp .= '"rua":"'.$rs["rua"].'",';
              $outp .= '"uf":"'.$rs["uf"].'",';
              $outp .= '"bairro":"'.$rs["bairro"].'",';
              $outp .= '"cidade":"'.$rs["cidade"].'",';
              $outp .= '"telefone":"'.$rs["telefoneCliente"].'",';
              $outp .= '"numero":"'.$rs["numero"].'",';
              $outp .= '"complemento":"'.$rs["complemento"].'",';
            //  $outp .= '"complemento":"'.$rs["complemento"].'",';
             // $outp .= '"cep":"'.$rs["cep"].'",';
              $outp .= '"id_usuarios":"'.$rs["id_usuarios"].'",';
  			$outp .= '"pais":"'.$rs["pais"]. '"}';
    }
    $outp ='{"records":['.$outp.']}';
    $conn->close();

    echo($outp);
} else{
 $conn->close();
    echo "lanchão do sérgiao";
}

?>
