<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";
$chave=$_GET["chave"];
$chaveH = '';




if($chave == $chaveH){
  $erro = false;

        $idUser=$_GET["idUser"];
	    	$uf=$_GET["uf"];
        $cidade=$_GET["cidade"];
        $bairro=$_GET["bairro"];
        $rua=$_GET["rua"];
        $numero=$_GET["numero"];
        $complemento=$_GET["complemento"];
        $cep=$_GET["cep"];


if(!$erro){
    $sql="update endereco set
          uf='$uf',
          cidade='$cidade',
          bairro='$bairro',
          rua='$rua',
          numero='$numero',
          complemento='$complemento',
          cep='$cep'

          where id_usuarios='$idUser'
    ";
    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }
     $conn->close();
  }
    } else{
       $conn->close();

    echo "lanchão do sérgiao";
}

?>
