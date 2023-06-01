<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


    include"config.php";
    
    $idUser=$_GET["idUser"];

    $sql="DELETE FROM carrinho where idUser='$idUser'";
    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }
     $conn->close();

?>
