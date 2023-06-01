<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";
$erro = false;
    $id=$_GET["id"];
		$telefone=$_GET["telefone"];
 if( strlen($telefone) != 11 ){
      $erro = true;
      echo 5;
    }

if(!$erro){
    $sql="update endereco set
          telefoneCliente='$telefone'

          where id_usuarios='$id'
    ";
    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }

}
 $conn->close();
?>
