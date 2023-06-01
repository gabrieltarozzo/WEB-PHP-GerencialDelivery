<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


		include"../config.php";

		$idProdutoP =$_GET["idProduto"];
		$idUser =$_GET["idUser"];

    // ID adicional, vai vir tipo: 39, 38
    // Preciso separar com explosion ou algo do tipo para 39
    //                                                    38
//$result=explode(",", implode($idAD));



    $sql="DELETE FROM adicionais_produto where id_user='$idUser' and id_produto = '$idProdutoP' ";

    $res=mysqli_query($conn,$sql);


    if($res){
      echo true;
    }else{
      echo false;
    }
 $conn->close();
?>
