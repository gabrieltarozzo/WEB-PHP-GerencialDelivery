<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if(isset($_GET["nome"]) && isset($_GET["senha"]) ){
	if( !empty($_GET["nome"])  && !empty($_GET["senha"])  ){

		include"config.php";

		$nome=$_GET["nome"];
		$senha=$_GET["senha"];

    $sql="insert into usuarios(nome,senha)
          values('$nome','$senha')
    ";
		
    $res=mysqli_query($conn,$sql);
    if($res){
      echo true;
    }else{
      echo false;
    }
     $conn->close();
	}
}

?>
