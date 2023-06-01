<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


		include"config.php";

		//$nome=$_GET["nome"];
		$senha=$_GET["senha"];
		$email=$_GET["email"];
		//$empresa=$_GET["empresa"];


		$query="SELECT * FROM usuarios
				where usuario='".$_GET["email"]."' or email='".$_GET["email"]."' and senha='".$_GET["senha"]."'";
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

?>
