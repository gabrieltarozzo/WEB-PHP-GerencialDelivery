<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

    include"config.php";

    $token=$_GET["token"];
    $meuID=$_GET["meuID"];

      $result_categoriaswe = "SELECT  `usuarios` . *, token FROM usuarios
  where `id` = '$meuID'  ";
  $resultado_categoriaswe = mysqli_query($conn, $result_categoriaswe);
  $rows_categoriasw = mysqli_fetch_assoc($resultado_categoriaswe);

  $MyToken =  $rows_categoriasw['token'];

  if ($MyToken == 'null' or $MyToken == null ) {
     $sql="UPDATE usuarios set token = '$token'
           where id ='$meuID'
     ";
     $res=mysqli_query($conn,$sql);
     if($res){
       echo true;
     }
     else{
       echo false;
     }

     }
 $conn->close();
?>  
