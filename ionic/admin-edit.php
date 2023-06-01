<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

		include"config.php";

    $id=$_GET["id"];
		$nome=$_GET["nome"];

    $sql="update usuarios set
          nome='$nome'

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
