<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if(isset($_GET["cep"]) && isset($_GET["cep"]) ){


    include"config.php";

    $erro = false;

    $id_usuarios=$_GET["id_usuarios"];
		$cep=$_GET["cep"];
    //$numero=$_GET["numero"];
    $rua=$_GET["rua"];
    $numero=$_GET["numero"];
    $telefone=$_GET["telefone"];
    $complemento=$_GET["complemento"];
    $bairro=$_GET["bairro"];
    $cidade=$_GET["cidade"];
    $uf=$_GET["uf"];

    if( strlen($telefone) != 11 ){
      $erro = true;
      echo 5;
    }

if(!$erro){
    $sql="insert into endereco(uf, cidade, bairro, rua, numero, telefoneCliente, complemento, CEP, id_usuarios, pais)
          values('$uf','$cidade','$bairro','$rua', '$numero', '$telefone', '$complemento', '$cep', '$id_usuarios', 'Brasil')
    ";

    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }

	}
}
 $conn->close();
?>
