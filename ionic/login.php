<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if(isset($_GET["email"]) && isset($_GET["senha"]) ){
	if( !empty($_GET["email"])  && !empty($_GET["senha"])  ){

		include"config.php";

		//$nome=$_GET["nome"];
		$senha=$_GET["senha"];
		$email=$_GET["email"];
		$empresa=$_GET["empresa"];
  $erro = false;


        $result_usuario = "SELECT id FROM usuarios WHERE senha='". $senha ."' and empresa='". $empresa ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows == 0)){
      $erro = true;
      echo 5;
      //senha incorreta
    //  $_SESSION['msg'] = "Este e-mail já está cadastrado";
    }


        $result_usuario = "SELECT id FROM usuarios WHERE senha='". $senha ."' and email='". $email ."' or senha='". $senha ."' and usuario='". $email ."' and empresa='". $empresa ."'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(($resultado_usuario) AND ($resultado_usuario->num_rows == 0)){
      $erro = true;
      echo 2;
      //credenciais incorretas
    //  $_SESSION['msg'] = "Este e-mail já está cadastrado";
    }


  //var_dump($dados);
  if(!$erro){


		$query="SELECT * FROM usuarios
				where usuario='".$_GET["email"]."' or email='".$_GET["email"]."' and senha='".$_GET["senha"]."' and empresa='". $empresa ."'";
		$result = $conn->query($query);




    $outp = "";
		if( $rs=$result->fetch_array()) {
			if ($outp != "") {$outp .= ",";}
			$outp .= '{"id":"'  . $rs["id"] . '",';
			$outp .= '"email":"'   . $rs["email"]        . '",';
			$outp .= '"nome":"'   . $rs["nome"]        . '",';
			$outp .= '"usuario":"'   . $rs["usuario"]        . '",';
			$outp .= '"empresa":"'   . $rs["empresa"]        . '",';
			$outp .= '"senha":"'. $rs["senha"]     . '"}';
		}

		$outp ='{"records":'.$outp.'}';

		$conn->close();

		echo($outp);
	}
}
}
?>
