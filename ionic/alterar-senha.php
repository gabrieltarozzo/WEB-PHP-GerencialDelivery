<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";

    $id=$_GET["id"];
		$senha=$_GET["senha"];

    $sql="update  usuarios set
          senha='$senha'

          where id='$id'
    ";
    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }
 $conn->close();
?>
